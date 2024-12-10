<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\VectorStoresFilesContract;
use Webfox\AzureOpenAI\Resources\VectorStoresFiles;
use Webfox\AzureOpenAI\Responses\VectorStores\Files\VectorStoreFileDeleteResponse;
use Webfox\AzureOpenAI\Responses\VectorStores\Files\VectorStoreFileListResponse;
use Webfox\AzureOpenAI\Responses\VectorStores\Files\VectorStoreFileResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class VectorStoresFilesTestResource implements VectorStoresFilesContract
{
    use Testable;

    public function resource(): string
    {
        return VectorStoresFiles::class;
    }

    public function retrieve(string $vectorStoreId, string $fileId): VectorStoreFileResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $vectorStoreId, string $fileId): VectorStoreFileDeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function create(string $vectorStoreId, array $parameters): VectorStoreFileResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function list(string $vectorStoreId, array $parameters = []): VectorStoreFileListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
