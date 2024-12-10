<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\CompletionsContract;
use Webfox\AzureOpenAI\Resources\Completions;
use Webfox\AzureOpenAI\Responses\Completions\CreateResponse;
use Webfox\AzureOpenAI\Responses\StreamResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class CompletionsTestResource implements CompletionsContract
{
    use Testable;

    protected function resource(): string
    {
        return Completions::class;
    }

    public function create(array $parameters): CreateResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function createStreamed(array $parameters): StreamResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
