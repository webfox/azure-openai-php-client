<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Threads\Runs;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\AzureOpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{type: string, function?: array{name: string}}>
 */
final class ThreadRunResponseToolChoice implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{type: string, function?: array{name: string}}>
     */
    use ArrayAccessible;

    use Fakeable;

    private function __construct(
        public string $type,
        public ?ThreadRunResponseToolChoiceFunction $function
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{type: string, function?: array{name: string}}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['type'],
            empty($attributes['function']) ? null : ThreadRunResponseToolChoiceFunction::from($attributes['function']),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        $response = [
            'type' => $this->type,
        ];

        if ($this->function instanceof \Webfox\AzureOpenAI\Responses\Threads\Runs\ThreadRunResponseToolChoiceFunction) {
            $response['function'] = $this->function->toArray();
        }

        return $response;
    }
}
