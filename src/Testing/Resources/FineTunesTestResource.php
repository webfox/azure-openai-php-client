<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\FineTunesContract;
use Webfox\AzureOpenAI\Resources\FineTunes;
use Webfox\AzureOpenAI\Responses\FineTunes\ListEventsResponse;
use Webfox\AzureOpenAI\Responses\FineTunes\ListResponse;
use Webfox\AzureOpenAI\Responses\FineTunes\RetrieveResponse;
use Webfox\AzureOpenAI\Responses\StreamResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class FineTunesTestResource implements FineTunesContract
{
    use Testable;

    protected function resource(): string
    {
        return FineTunes::class;
    }

    public function create(array $parameters): RetrieveResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function list(): ListResponse
    {
        return $this->record(__FUNCTION__);
    }

    public function retrieve(string $fineTuneId): RetrieveResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function cancel(string $fineTuneId): RetrieveResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function listEvents(string $fineTuneId): ListEventsResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function listEventsStreamed(string $fineTuneId): StreamResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
