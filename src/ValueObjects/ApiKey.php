<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\ValueObjects;

use Webfox\AzureOpenAI\Contracts\StringableContract;

/**
 * @internal
 */
final class ApiKey implements StringableContract
{
    /**
     * Creates a new API token value object.
     */
    private function __construct(public readonly string $apiKey)
    {
        // ..
    }

    public static function from(string $apiKey): self
    {
        return new self($apiKey);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->apiKey;
    }
}
