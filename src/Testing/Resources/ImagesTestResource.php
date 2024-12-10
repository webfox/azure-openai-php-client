<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\ImagesContract;
use Webfox\AzureOpenAI\Resources\Images;
use Webfox\AzureOpenAI\Responses\Images\CreateResponse;
use Webfox\AzureOpenAI\Responses\Images\EditResponse;
use Webfox\AzureOpenAI\Responses\Images\VariationResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

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
