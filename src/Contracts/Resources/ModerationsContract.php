<?php

namespace Webfox\OpenAI\Contracts\Resources;

use Webfox\OpenAI\Responses\Moderations\CreateResponse;

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
