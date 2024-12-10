<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\VectorStoresFileBatchesContract;
use Webfox\AzureOpenAI\Resources\VectorStoresFileBatches;
use Webfox\AzureOpenAI\Responses\VectorStores\FileBatches\VectorStoreFileBatchResponse;
use Webfox\AzureOpenAI\Responses\VectorStores\Files\VectorStoreFileListResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class VectorStoresFileBatchesTestResource implements VectorStoresFileBatchesContract
{
    use Testable;

    public function resource(): string
    {
        return VectorStoresFileBatches::class;
    }

    public function retrieve(string $vectorStoreId, string $fileBatchId): VectorStoreFileBatchResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function cancel(string $vectorStoreId, string $fileBatchId): VectorStoreFileBatchResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function create(string $vectorStoreId, array $parameters): VectorStoreFileBatchResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function listFiles(string $vectorStoreId, string $fileBatchId, array $parameters = []): VectorStoreFileListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
