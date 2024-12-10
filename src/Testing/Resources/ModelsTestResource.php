<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\ModelsContract;
use Webfox\AzureOpenAI\Resources\Models;
use Webfox\AzureOpenAI\Responses\Models\DeleteResponse;
use Webfox\AzureOpenAI\Responses\Models\ListResponse;
use Webfox\AzureOpenAI\Responses\Models\RetrieveResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class ModelsTestResource implements ModelsContract
{
    use Testable;

    protected function resource(): string
    {
        return Models::class;
    }

    public function list(): ListResponse
    {
        return $this->record(__FUNCTION__);
    }

    public function retrieve(string $model): RetrieveResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $model): DeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
