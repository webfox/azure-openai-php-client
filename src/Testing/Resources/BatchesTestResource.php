<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\BatchesContract;
use Webfox\AzureOpenAI\Resources\Batches;
use Webfox\AzureOpenAI\Responses\Batches\BatchListResponse;
use Webfox\AzureOpenAI\Responses\Batches\BatchResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class BatchesTestResource implements BatchesContract
{
    use Testable;

    public function resource(): string
    {
        return Batches::class;
    }

    public function create(array $parameters): BatchResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieve(string $id): BatchResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function cancel(string $id): BatchResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function list(array $parameters = []): BatchListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
