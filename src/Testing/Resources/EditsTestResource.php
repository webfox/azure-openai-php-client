<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\EditsContract;
use Webfox\AzureOpenAI\Resources\Edits;
use Webfox\AzureOpenAI\Responses\Edits\CreateResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class EditsTestResource implements EditsContract
{
    use Testable;

    protected function resource(): string
    {
        return Edits::class;
    }

    public function create(array $parameters): CreateResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
