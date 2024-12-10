<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\FilesContract;
use Webfox\AzureOpenAI\Resources\Files;
use Webfox\AzureOpenAI\Responses\Files\CreateResponse;
use Webfox\AzureOpenAI\Responses\Files\DeleteResponse;
use Webfox\AzureOpenAI\Responses\Files\ListResponse;
use Webfox\AzureOpenAI\Responses\Files\RetrieveResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class FilesTestResource implements FilesContract
{
    use Testable;

    protected function resource(): string
    {
        return Files::class;
    }

    public function list(): ListResponse
    {
        return $this->record(__FUNCTION__);
    }

    public function retrieve(string $file): RetrieveResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function download(string $file): string
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function upload(array $parameters): CreateResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $file): DeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
