<?php

namespace Webfox\OpenAI\Testing\Resources\Concerns;

use Webfox\OpenAI\Contracts\ResponseContract;
use Webfox\OpenAI\Contracts\ResponseStreamContract;
use Webfox\OpenAI\Testing\ClientFake;
use Webfox\OpenAI\Testing\Requests\TestRequest;

trait Testable
{
    public function __construct(protected ClientFake $fake) {}

    abstract protected function resource(): string;

    /**
     * @param  array<string, mixed>  $args
     */
    protected function record(string $method, array $args = []): ResponseContract|ResponseStreamContract|string
    {
        return $this->fake->record(new TestRequest($this->resource(), $method, $args));
    }

    public function assertSent(callable|int|null $callback = null): void
    {
        $this->fake->assertSent($this->resource(), $callback);
    }

    public function assertNotSent(callable|int|null $callback = null): void
    {
        $this->fake->assertNotSent($this->resource(), $callback);
    }
}
