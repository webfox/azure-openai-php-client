<?php

declare(strict_types=1);

namespace Webfox\OpenAI\Responses\Batches;

use Webfox\OpenAI\Contracts\ResponseContract;
use Webfox\OpenAI\Responses\Concerns\ArrayAccessible;

/**
 * @implements ResponseContract<array{code: string, message: string, param: ?string, line: ?int}>
 */
final class BatchResponseErrorsData implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{code: string, message: string, param: ?string, line: ?int}>
     */
    use ArrayAccessible;

    private function __construct(
        public string $code,
        public string $message,
        public ?string $param,
        public ?int $line,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{code: string, message: string, param: ?string, line: ?int}  $attributes
     */
    public static function from(array $attributes): self
    {

        return new self(
            $attributes['code'],
            $attributes['message'],
            $attributes['param'],
            $attributes['line'],
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'param' => $this->param,
            'line' => $this->line,
        ];
    }
}
