<?php

namespace Webfox\OpenAI\Testing\Resources;

use Webfox\OpenAI\Contracts\Resources\FineTunesContract;
use Webfox\OpenAI\Resources\FineTunes;
use Webfox\OpenAI\Responses\FineTunes\ListEventsResponse;
use Webfox\OpenAI\Responses\FineTunes\ListResponse;
use Webfox\OpenAI\Responses\FineTunes\RetrieveResponse;
use Webfox\OpenAI\Responses\StreamResponse;
use Webfox\OpenAI\Testing\Resources\Concerns\Testable;

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
