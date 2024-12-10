<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\ModerationsContract;
use Webfox\AzureOpenAI\Responses\Moderations\CreateResponse;
use Webfox\AzureOpenAI\ValueObjects\Transporter\Payload;
use Webfox\AzureOpenAI\ValueObjects\Transporter\Response;

final class Moderations implements ModerationsContract
{
    use Concerns\Transportable;

    /**
     * Classifies if text violates OpenAI's Content Policy.
     *
     * @see https://platform.openai.com/docs/api-reference/moderations/create
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse
    {
        $payload = Payload::create('moderations', $parameters);

        /** @var Response<array{id: string, model: string, results: array<int, array{categories: array<string, bool>, category_scores: array<string, float>, flagged: bool}>}> $response */
        $response = $this->transporter->requestObject($payload);

        return CreateResponse::from($response->data(), $response->meta());
    }
}
