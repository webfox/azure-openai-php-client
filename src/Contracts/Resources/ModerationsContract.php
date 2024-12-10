<?php

namespace Webfox\AzureOpenAI\Contracts\Resources;

use Webfox\AzureOpenAI\Responses\Moderations\CreateResponse;

interface ModerationsContract
{
    /**
     * Classifies if text violates OpenAI's Content Policy.
     *
     * @see https://platform.openai.com/docs/api-reference/moderations/create
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse;
}
