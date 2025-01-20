<?php

namespace Webfox\OpenAI\Testing\Resources;

use Webfox\OpenAI\Contracts\Resources\ModerationsContract;
use Webfox\OpenAI\Resources\Moderations;
use Webfox\OpenAI\Responses\Moderations\CreateResponse;
use Webfox\OpenAI\Testing\Resources\Concerns\Testable;

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
