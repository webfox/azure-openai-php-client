<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\VectorStores\Files;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\AzureOpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{code: string, message: string}>
 */
final class VectorStoreFileResponseLastError implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{code: string, message: string}>
     */
    use ArrayAccessible;

    use Fakeable;

    private function __construct(
        public readonly string $code,
        public readonly string $message,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{code: string, message: string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['code'],
            $attributes['message'],
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
        ];
    }
}
