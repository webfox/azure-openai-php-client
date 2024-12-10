<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\ThreadsMessagesContract;
use Webfox\AzureOpenAI\Resources\ThreadsMessages;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageDeleteResponse;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageListResponse;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class ThreadsMessagesTestResource implements ThreadsMessagesContract
{
    use Testable;

    public function resource(): string
    {
        return ThreadsMessages::class;
    }

    public function create(string $threadId, array $parameters): ThreadMessageResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieve(string $threadId, string $messageId): ThreadMessageResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function modify(string $threadId, string $messageId, array $parameters): ThreadMessageResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $threadId, string $messageId): ThreadMessageDeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function list(string $threadId, array $parameters = []): ThreadMessageListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
