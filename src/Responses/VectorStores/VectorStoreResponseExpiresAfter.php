<?php

declare(strict_types=1);

namespace Webfox\OpenAI\Responses\VectorStores;

use Webfox\OpenAI\Contracts\ResponseContract;
use Webfox\OpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{anchor: string, days: int}>
 */
final class VectorStoreResponseExpiresAfter implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{anchor: string, days: int}>
     */
    use ArrayAccessible;

    use Fakeable;

    private function __construct(
        public readonly string $anchor,
        public readonly int $days,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{anchor: string, days: int}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['anchor'],
            $attributes['days'],
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'anchor' => $this->anchor,
            'days' => $this->days,
        ];
    }
}
