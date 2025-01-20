<?php

namespace Webfox\OpenAI\Contracts\Resources;

use Webfox\OpenAI\Responses\Completions\CreateResponse;
use Webfox\OpenAI\Responses\Completions\CreateStreamedResponse;
use Webfox\OpenAI\Responses\StreamResponse;

interface CompletionsContract
{
    /**
     * Creates a completion for the provided prompt and parameters
     *
     * @see https://platform.openai.com/docs/api-reference/completions/create-completion
     *
     * @param  array<string, mixed>  $parameters
     */
    public function create(array $parameters): CreateResponse;

    /**
     * Creates a streamed completion for the provided prompt and parameters
     *
     * @see https://platform.openai.com/docs/api-reference/completions/create-completion
     *
     * @param  array<string, mixed>  $parameters
     * @return StreamResponse<CreateStreamedResponse>
     */
    public function createStreamed(array $parameters): StreamResponse;
}
