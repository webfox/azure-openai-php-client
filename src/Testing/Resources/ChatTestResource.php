<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\ChatContract;
use Webfox\AzureOpenAI\Resources\Chat;
use Webfox\AzureOpenAI\Responses\Chat\CreateResponse;
use Webfox\AzureOpenAI\Responses\StreamResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class ChatTestResource implements ChatContract
{
    use Testable;

    protected function resource(): string
    {
        return Chat::class;
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
