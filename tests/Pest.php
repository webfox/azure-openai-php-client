<?php

use Webfox\AzureOpenAI\Client;
use Webfox\AzureOpenAI\Contracts\TransporterContract;
use Webfox\AzureOpenAI\ValueObjects\ApiKey;
use Webfox\AzureOpenAI\ValueObjects\Transporter\BaseUri;
use Webfox\AzureOpenAI\ValueObjects\Transporter\Headers;
use Webfox\AzureOpenAI\ValueObjects\Transporter\Payload;
use Webfox\AzureOpenAI\ValueObjects\Transporter\QueryParams;
use Webfox\AzureOpenAI\ValueObjects\Transporter\Response;
use Psr\Http\Message\ResponseInterface;

function mockClient(string $method, string $resource, array $params, Response|ResponseInterface|string $response, $methodName = 'requestObject', bool $validateParams = true)
{
    $transporter = Mockery::mock(TransporterContract::class);

    $transporter
        ->shouldReceive($methodName)
        ->once()
        ->withArgs(function (Payload $payload) use ($validateParams, $method, $resource, $params) {
            $baseUri = BaseUri::from('api.openai.com/v1');
            $headers = Headers::withAuthorization(ApiKey::from('foo'));
            $queryParams = QueryParams::create();

            $request = $payload->toRequest($baseUri, $headers, $queryParams);

            if ($validateParams) {
                if (in_array($method, ['GET', 'DELETE'])) {
                    if ($request->getUri()->getQuery() !== http_build_query($params)) {
                        return false;
                    }
                } else {
                    if ($request->getBody()->getContents() !== json_encode($params)) {
                        return false;
                    }
                }
            }

            return $request->getMethod() === $method
                && $request->getUri()->getPath() === "/v1/$resource";
        })->andReturn($response);

    return new Client($transporter);
}

function mockContentClient(string $method, string $resource, array $params, string $response, bool $validateParams = true)
{
    return mockClient($method, $resource, $params, $response, 'requestContent', $validateParams);
}

function mockStreamClient(string $method, string $resource, array $params, ResponseInterface $response, bool $validateParams = true)
{
    return mockClient($method, $resource, $params, $response, 'requestStream', $validateParams);
}
