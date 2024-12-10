<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\ThreadsContract;
use Webfox\AzureOpenAI\Resources\Threads;
use Webfox\AzureOpenAI\Responses\StreamResponse;
use Webfox\AzureOpenAI\Responses\Threads\Runs\ThreadRunResponse;
use Webfox\AzureOpenAI\Responses\Threads\ThreadDeleteResponse;
use Webfox\AzureOpenAI\Responses\Threads\ThreadResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class ThreadsTestResource implements ThreadsContract
{
    use Testable;

    public function resource(): string
    {
        return Threads::class;
    }

    public function create(array $parameters): ThreadResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function createAndRun(array $parameters): ThreadRunResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function createAndRunStreamed(array $parameters): StreamResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieve(string $id): ThreadResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function modify(string $id, array $parameters): ThreadResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $id): ThreadDeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function messages(): ThreadsMessagesTestResource
    {
        return new ThreadsMessagesTestResource($this->fake);
    }

    public function runs(): ThreadsRunsTestResource
    {
        return new ThreadsRunsTestResource($this->fake);
    }
}
