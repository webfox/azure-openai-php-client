<?php

declare(strict_types=1);

namespace Webfox\OpenAI\Responses\Chat;

final class CreateResponseCitation
{
    private function __construct(
        public readonly ?string $content,
        public readonly ?string $title,
        public readonly ?string $url,
        public readonly ?string $filepath,
        public readonly ?string $chunkId,
    ) {}

    /**
     * @param  array{content?: string, title?: string, url: string, filepath?: string, chunk_id?: string}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['content'] ?? null,
            $attributes['title'] ?? null,
            $attributes['url'] ?? null,
            $attributes['filepath'] ?? null,
            $attributes['chunk_id'] ?? null,
        );
    }

    /**
     * @return array{content?: string, title?: string, url?: string, filepath?: string, chunk_id?: string}
     */
    public function toArray(): array
    {
        return array_filter([
            'content' => $this->content,
            'title' => $this->title,
            'url' => $this->url,
            'filepath' => $this->filepath,
            'chunk_id' => $this->chunkId,
        ]);
    }
}
