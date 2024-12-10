<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Threads\Runs;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\AzureOpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{id: string, type: string, function: array{name: string, arguments: string}}>
 */
final class ThreadRunResponseRequiredActionFunctionToolCall implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{id: string, type: string, function: array{name: string, arguments: string}}>
     */
    use ArrayAccessible;

    use Fakeable;

    private function __construct(
        public string $id,
        public string $type,
        public ThreadRunResponseRequiredActionFunctionToolCallFunction $function,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{id: string, type: string, function: array{name: string, arguments: string}}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['type'],
            ThreadRunResponseRequiredActionFunctionToolCallFunction::from($attributes['function']),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'function' => $this->function->toArray(),
        ];
    }
}
