<?php

use Webfox\AzureOpenAI\Resources\Chat;
use Webfox\AzureOpenAI\Responses\Chat\CreateResponse;
use Webfox\AzureOpenAI\Responses\Chat\CreateStreamedResponse;
use Webfox\AzureOpenAI\Testing\ClientFake;

it('records a chat create request', function () {
    $fake = new ClientFake([
        CreateResponse::fake(),
    ]);

    $fake->chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => 'Hello!'],
        ],
    ]);

    $fake->assertSent(Chat::class, function ($method, $parameters) {
        return $method === 'create' &&
            $parameters['model'] === 'gpt-3.5-turbo' &&
            $parameters['messages'][0]['role'] === 'user' &&
            $parameters['messages'][0]['content'] === 'Hello!';
    });
});

it('records a streamed create create request', function () {
    $fake = new ClientFake([
        CreateStreamedResponse::fake(),
    ]);

    $fake->chat()->createStreamed([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => 'Hello!'],
        ],
    ]);

    $fake->assertSent(Chat::class, function ($method, $parameters) {
        return $method === 'createStreamed' &&
            $parameters['model'] === 'gpt-3.5-turbo' &&
            $parameters['messages'][0]['role'] === 'user' &&
            $parameters['messages'][0]['content'] === 'Hello!';
    });
});
