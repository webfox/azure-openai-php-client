<?php

namespace Webfox\OpenAI\Testing\Resources;

use Webfox\OpenAI\Contracts\Resources\ModelsContract;
use Webfox\OpenAI\Resources\Models;
use Webfox\OpenAI\Responses\Models\DeleteResponse;
use Webfox\OpenAI\Responses\Models\ListResponse;
use Webfox\OpenAI\Responses\Models\RetrieveResponse;
use Webfox\OpenAI\Testing\Resources\Concerns\Testable;

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
