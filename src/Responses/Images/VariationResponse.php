<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Images;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Contracts\ResponseHasMetaInformationContract;
use Webfox\AzureOpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\AzureOpenAI\Responses\Concerns\HasMetaInformation;
use Webfox\AzureOpenAI\Responses\Meta\MetaInformation;
use Webfox\AzureOpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{created: int, data: array<int, array{url?: string, b64_json?: string}>}>
 */
final class VariationResponse implements ResponseContract, ResponseHasMetaInformationContract
{
    /**
     * @use ArrayAccessible<array{created: int, data: array<int, array{url?: string, b64_json?: string}>}>
     */
    use ArrayAccessible;

    use Fakeable;
    use HasMetaInformation;

    /**
     * @param  array<int, VariationResponseData>  $data
     */
    private function __construct(
        public readonly int $created,
        public readonly array $data,
        private readonly MetaInformation $meta,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{created: int, data: array<int, array{url?: string, b64_json?: string}>}  $attributes
     */
    public static function from(array $attributes, MetaInformation $meta): self
    {
        $results = array_map(fn (array $result): VariationResponseData => VariationResponseData::from(
            $result
        ), $attributes['data']);

        return new self(
            $attributes['created'],
            $results,
            $meta,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'created' => $this->created,
            'data' => array_map(
                static fn (VariationResponseData $result): array => $result->toArray(),
                $this->data,
            ),
        ];
    }
}
