<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Threads\Runs\Steps;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\AzureOpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{type: 'image', image: array{file_id: string}}>
 */
final class ThreadRunStepResponseCodeInterpreterOutputImage implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{type: 'image', image: array{file_id: string}}>
     */
    use ArrayAccessible;

    use Fakeable;

    /**
     * @param  'image'  $type
     */
    private function __construct(
        public string $type,
        public ThreadRunStepResponseCodeInterpreterOutputImageImage $image,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{type: 'image', image: array{file_id: string}}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['type'],
            ThreadRunStepResponseCodeInterpreterOutputImageImage::from($attributes['image']),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'image' => $this->image->toArray(),
        ];
    }
}
