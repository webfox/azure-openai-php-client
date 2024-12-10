<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\EmbeddingsContract;
use Webfox\AzureOpenAI\Responses\Embeddings\CreateResponse;
use Webfox\AzureOpenAI\ValueObjects\Transporter\Payload;
use Webfox\AzureOpenAI\ValueObjects\Transporter\Response;

final class Embeddings implements EmbeddingsContract
{
    use Concerns\Transportable;

    /**
     * Creates an embedding vector representing the input text.
     *
     * @see https://platform.openai.com/docs/api-reference/embeddings/create
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('embeddings', $parameters);

        /** @var Response<array{object: string, data: array<int, array{object: string, embedding: array<int, float>, index: int}>, usage: array{prompt_tokens: int, total_tokens: int}}> $response */
        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data(), $response->meta());
    }
}
