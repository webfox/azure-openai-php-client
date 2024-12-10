<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\EmbeddingsContract;
use Webfox\AzureOpenAI\Resources\Embeddings;
use Webfox\AzureOpenAI\Responses\Embeddings\CreateResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class EmbeddingsTestResource implements EmbeddingsContract
{
    use Testable;

    protected function resource(): string
    {
        return Embeddings::class;
    }

    public function create(array $parameters): CreateResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
