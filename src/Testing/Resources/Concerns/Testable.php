<?php

namespace Webfox\AzureOpenAI\Testing\Resources\Concerns;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Contracts\ResponseStreamContract;
use Webfox\AzureOpenAI\Testing\ClientFake;
use Webfox\AzureOpenAI\Testing\Requests\TestRequest;

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
