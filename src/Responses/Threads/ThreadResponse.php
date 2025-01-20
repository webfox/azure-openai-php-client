<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Threads;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Contracts\ResponseHasMetaInformationContract;
use Webfox\AzureOpenAI\Responses\Assistants\AssistantResponseToolResources;
use Webfox\AzureOpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\AzureOpenAI\Responses\Concerns\HasMetaInformation;
use Webfox\AzureOpenAI\Responses\Meta\MetaInformation;
use Webfox\AzureOpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{id: string, object: string, created_at: int, tool_resources: ?array{code_interpreter?: array{file_ids: array<int,string>}, file_search?: array{vector_store_ids: array<int,string>}}, metadata: array<string, string>}>
 */
final class ThreadResponse implements ResponseContract, ResponseHasMetaInformationContract
{
    /**
     * @use ArrayAccessible<array{id: string, object: string, created_at: int, tool_resources: ?array{code_interpreter?: array{file_ids: array<int,string>}, file_search?: array{vector_store_ids: array<int,string>}}, metadata: array<string, string>}>
     */
    use ArrayAccessible;

    use Fakeable;
    use HasMetaInformation;

    /**
     * @param  array<string, string>  $metadata
     */
    private function __construct(
        public string $id,
        public string $object,
        public int $createdAt,
        public ?AssistantResponseToolResources $toolResources,
        public array $metadata,
        private readonly MetaInformation $meta,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{id: string, object: string, created_at: int, tool_resources: ?array{code_interpreter?: array{file_ids: array<int,string>}, file_search?: array{vector_store_ids: array<int,string>}}, metadata: array<string, string>}  $attributes
     */
    public static function from(array $attributes, MetaInformation $meta): self
    {
        return new self(
            $attributes['id'],
            $attributes['object'],
            $attributes['created_at'],
            isset($attributes['tool_resources']) ? AssistantResponseToolResources::from($attributes['tool_resources']) : null,
            $attributes['metadata'],
            $meta,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'object' => $this->object,
            'created_at' => $this->createdAt,
            'tool_resources' => $this->toolResources?->toArray(),
            'metadata' => $this->metadata,
        ];
    }
}
