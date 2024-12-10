<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\ModerationsContract;
use Webfox\AzureOpenAI\Resources\Moderations;
use Webfox\AzureOpenAI\Responses\Moderations\CreateResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class ModerationsTestResource implements ModerationsContract
{
    use Testable;

    protected function resource(): string
    {
        return Moderations::class;
    }

    public function create(array $parameters): CreateResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
