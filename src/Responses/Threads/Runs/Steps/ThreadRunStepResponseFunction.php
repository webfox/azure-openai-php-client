<?php

declare(strict_types=1);

namespace Webfox\OpenAI\Responses\Threads\Runs\Steps;

use Webfox\OpenAI\Contracts\ResponseContract;
use Webfox\OpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{name: ?string, arguments: string, output: ?string}>
 */
final class ThreadRunStepResponseFunction implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{name: ?string, arguments: string, output: ?string}>
     */
    use ArrayAccessible;

    use Fakeable;

    private function __construct(
        public ?string $name,
        public string $arguments,
        public ?string $output,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{name?: string, arguments: string, output?: ?string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['name'] ?? null,
            $attributes['arguments'],
            $attributes['output'] ?? null,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'arguments' => $this->arguments,
            'output' => $this->output,
        ];
    }
}
