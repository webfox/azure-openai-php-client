<?php

use Webfox\OpenAI\Resources\Moderations;
use Webfox\OpenAI\Responses\Moderations\CreateResponse;
use Webfox\OpenAI\Testing\ClientFake;

it('records a moderations create request', function () {
    $fake = new ClientFake([
        CreateResponse::fake(),
    ]);

    $fake->moderations()->create([
        'model' => 'text-moderation-latest',
        'input' => 'I want to k*** them.',
    ]);

    $fake->assertSent(Moderations::class, function ($method, $parameters) {
        return $method === 'create' &&
            $parameters['model'] === 'text-moderation-latest' &&
            $parameters['input'] === 'I want to k*** them.';
    });
});
