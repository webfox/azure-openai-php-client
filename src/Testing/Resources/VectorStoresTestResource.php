<?php

namespace Webfox\OpenAI\Testing\Resources;

use Webfox\OpenAI\Contracts\Resources\VectorStoresContract;
use Webfox\OpenAI\Contracts\Resources\VectorStoresFileBatchesContract;
use Webfox\OpenAI\Contracts\Resources\VectorStoresFilesContract;
use Webfox\OpenAI\Resources\VectorStores;
use Webfox\OpenAI\Responses\VectorStores\VectorStoreDeleteResponse;
use Webfox\OpenAI\Responses\VectorStores\VectorStoreListResponse;
use Webfox\OpenAI\Responses\VectorStores\VectorStoreResponse;
use Webfox\OpenAI\Testing\Resources\Concerns\Testable;

final class VectorStoresTestResource implements VectorStoresContract
{
    use Testable;

    public function resource(): string
    {
        return VectorStores::class;
    }

    public function modify(string $vectorStoreId, array $parameters): VectorStoreResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieve(string $vectorStoreId): VectorStoreResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $vectorStoreId): VectorStoreDeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function create(array $parameters): VectorStoreResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function list(array $parameters = []): VectorStoreListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function files(): VectorStoresFilesContract
    {
        return new VectorStoresFilesTestResource($this->fake);
    }

    public function batches(): VectorStoresFileBatchesContract
    {
        return new VectorStoresFileBatchesTestResource($this->fake);
    }
}
