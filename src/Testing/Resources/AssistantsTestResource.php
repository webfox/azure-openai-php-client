<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\AssistantsContract;
use Webfox\AzureOpenAI\Resources\Assistants;
use Webfox\AzureOpenAI\Responses\Assistants\AssistantDeleteResponse;
use Webfox\AzureOpenAI\Responses\Assistants\AssistantListResponse;
use Webfox\AzureOpenAI\Responses\Assistants\AssistantResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class AssistantsTestResource implements AssistantsContract
{
    use Testable;

    public function resource(): string
    {
        return Assistants::class;
    }

    public function create(array $parameters): AssistantResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieve(string $id): AssistantResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function modify(string $id, array $parameters): AssistantResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $id): AssistantDeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function list(array $parameters = []): AssistantListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
