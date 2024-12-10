<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Chat;

final class CreateResponseMessage
{
    /**
     * @param  array<int, CreateResponseToolCall>  $toolCalls
     */
    private function __construct(
        public readonly string $role,
        public readonly ?string $content,
        public readonly ?CreateResponseContext $context,
        public readonly array $toolCalls,
        public readonly ?CreateResponseFunctionCall $functionCall,
    ) {}

    /**
     * @param  array{role: string, content: ?string, context: ?array{citations?: array<int, array{content?: string, title?: string, url?: string, filepath?: string, chunk_id?: int|string}>, intent: string}, function_call: ?array{name: string, arguments: string}, tool_calls: ?array<int, array{id: string, type: string, function: array{name: string, arguments: string}}>}  $attributes
     */
    public static function from(array $attributes): self
    {
        $toolCalls = array_map(fn (array $result): CreateResponseToolCall => CreateResponseToolCall::from(
            $result
        ), $attributes['tool_calls'] ?? []);

        return new self(
            $attributes['role'],
            $attributes['content'] ?? null,
            isset($attributes['context']) ? CreateResponseContext::from($attributes['context']) : null,
            $toolCalls,
            isset($attributes['function_call']) ? CreateResponseFunctionCall::from($attributes['function_call']) : null,
        );
    }

    /**
     * @return array{role: string, content: string|null, function_call?: array{name: string, arguments: string}, tool_calls?: array<int, array{id: string, type: string, function: array{name: string, arguments: string}}>}
     */
    public function toArray(): array
    {
        $data = [
            'role' => $this->role,
            'content' => $this->content,
        ];

        if ($this->functionCall instanceof CreateResponseFunctionCall) {
            $data['function_call'] = $this->functionCall->toArray();
        }

        if ($this->context instanceof CreateResponseContext) {
            $data['context'] = $this->context->toArray();
        }

        if ($this->toolCalls !== []) {
            $data['tool_calls'] = array_map(fn (CreateResponseToolCall $toolCall): array => $toolCall->toArray(), $this->toolCalls);
        }

        return $data;
    }
}
