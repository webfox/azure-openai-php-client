<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Chat;

final class CreateResponseContext
{
    /**
     * @param array{citations: list<array{citation: CreateResponseCitation}>} $citations
     */
    private function __construct(
        public readonly array   $citations,
        public readonly ?string $intent,
    )
    {
    }

    public static function from(array $attributes): self
    {
        $citations = array_map(fn(array $result): CreateResponseCitation => CreateResponseCitation::from(
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
            $data['citations'] = array_map(fn(CreateResponseCitation $citation): array => $citation->toArray(), $this->citations);
        }

        return $data;
    }
}
