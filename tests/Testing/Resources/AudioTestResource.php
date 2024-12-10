<?php

use Webfox\AzureOpenAI\Resources\Audio;
use Webfox\AzureOpenAI\Responses\Audio\SpeechStreamResponse;
use Webfox\AzureOpenAI\Responses\Audio\TranscriptionResponse;
use Webfox\AzureOpenAI\Responses\Audio\TranslationResponse;
use Webfox\AzureOpenAI\Testing\ClientFake;

it('records a speech request', function () {
    $fake = new ClientFake([
        'fake-mp3-content',
    ]);

    $fake->audio()->speech([
        'model' => 'tts-1',
        'input' => 'Hello, how are you?',
        'voice' => 'alloy',
    ]);

    $fake->assertSent(Audio::class, function ($method, $parameters) {
        return $method === 'speech' &&
            $parameters === [
                'model' => 'tts-1',
                'input' => 'Hello, how are you?',
                'voice' => 'alloy',
            ];
    });
});

it('records a streamed speech request', function () {
    $fake = new ClientFake([
        SpeechStreamResponse::fake(),
    ]);

    $fake->audio()->speechStreamed([
        'model' => 'tts-1',
        'input' => 'Hello, how are you?',
        'voice' => 'alloy',
    ]);

    $fake->assertSent(Audio::class, function ($method, $parameters) {
        return $method === 'speechStreamed' &&
            $parameters === [
                'model' => 'tts-1',
                'input' => 'Hello, how are you?',
                'voice' => 'alloy',
            ];
    });
});

it('records an audio transcription request', function () {
    $fake = new ClientFake([
        TranscriptionResponse::fake(),
    ]);

    $fake->audio()->transcribe([
        'model' => 'whisper-1',
        'response_format' => 'verbose_json',
    ]);

    $fake->assertSent(Audio::class, function ($method, $parameters) {
        return $method === 'transcribe' &&
            $parameters['model'] === 'whisper-1' &&
            $parameters['response_format'] === 'verbose_json';
    });
});

it('records an audio translation request', function () {
    $fake = new ClientFake([
        TranslationResponse::fake(),
    ]);

    $fake->audio()->translate([
        'model' => 'whisper-1',
        'response_format' => 'verbose_json',
    ]);

    $fake->assertSent(Audio::class, function ($method, $parameters) {
        return $method === 'translate' &&
            $parameters['model'] === 'whisper-1' &&
            $parameters['response_format'] === 'verbose_json';
    });
});
