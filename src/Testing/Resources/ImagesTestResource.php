<?php

namespace Webfox\OpenAI\Testing\Resources;

use Webfox\OpenAI\Contracts\Resources\ImagesContract;
use Webfox\OpenAI\Resources\Images;
use Webfox\OpenAI\Responses\Images\CreateResponse;
use Webfox\OpenAI\Responses\Images\EditResponse;
use Webfox\OpenAI\Responses\Images\VariationResponse;
use Webfox\OpenAI\Testing\Resources\Concerns\Testable;

final class ImagesTestResource implements ImagesContract
{
    use Testable;

    protected function resource(): string
    {
        return Images::class;
    }

    public function create(array $parameters): CreateResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function edit(array $parameters): EditResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function variation(array $parameters): VariationResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
