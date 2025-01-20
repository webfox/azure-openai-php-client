<?php

namespace Webfox\OpenAI\Testing\Resources;

use Webfox\OpenAI\Contracts\Resources\VectorStoresFilesContract;
use Webfox\OpenAI\Resources\VectorStoresFiles;
use Webfox\OpenAI\Responses\VectorStores\Files\VectorStoreFileDeleteResponse;
use Webfox\OpenAI\Responses\VectorStores\Files\VectorStoreFileListResponse;
use Webfox\OpenAI\Responses\VectorStores\Files\VectorStoreFileResponse;
use Webfox\OpenAI\Testing\Resources\Concerns\Testable;

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
