<?php

declare(strict_types=1);

namespace Webfox\OpenAI\Responses\Threads\Messages;

use Webfox\OpenAI\Contracts\ResponseContract;
use Webfox\OpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{type: 'file_search'}>
 */
final class ThreadMessageResponseAttachmentFileSearchTool implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{type: 'file_search'}>
     */
    use ArrayAccessible;

    use Fakeable;

    /**
     * @param  'file_search'  $type
     */
    private function __construct(
        public string $type,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{type: 'file_search'}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['type'],
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
        ];
    }
}
