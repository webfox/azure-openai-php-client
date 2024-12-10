<?php

namespace Webfox\AzureOpenAI\Contracts\Resources;

use Webfox\AzureOpenAI\Responses\Chat\CreateResponse;
use Webfox\AzureOpenAI\Responses\Chat\CreateStreamedResponse;
use Webfox\AzureOpenAI\Responses\StreamResponse;

interface ChatContract
{
    /**
     * Creates a completion for the chat message
     *
     * @see https://platform.openai.com/docs/api-reference/chat/create
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse;

    /**
     * Creates a streamed completion for the chat message
     *
     * @see https://platform.openai.com/docs/api-reference/chat/create
     *
     * @param  array<string, mixed>  $parameters
     * @return StreamResponse<CreateStreamedResponse>
     */
    public function createStreamed(array $parameters): StreamResponse;
}
