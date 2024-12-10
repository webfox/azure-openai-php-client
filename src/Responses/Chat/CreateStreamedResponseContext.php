<?php

declare(strict_types=1);

namespace OpenAI\Responses\Chat;

final class CreateStreamedResponseContext
{
    /**
     * @param array{citations: list<array{citation: CreateStreamedResponseCitation}>} $citations
     */
    private function __construct(
        public readonly array   $citations,
        public readonly ?string $intent,
    )
    {
    }

    public static function from(array $attributes): self
    {
        $citations = array_map(fn(array $result): CreateStreamedResponseCitation => CreateStreamedResponseCitation::from(
            $result
        ), $attributes['citations'] ?? []);

        return new self(
            $citations,
            $attributes['intent'] ?? null,
        );
    }

    public function toArray(): array
    {
        $data = [
            'intent' => $this->intent,
        ];

        if ($this->citations !== []) {
            $data['citations'] = array_map(fn(CreateStreamedResponseCitation $citation): array => $citation->toArray(), $this->citations);
        }

        return $data;
    }
}
