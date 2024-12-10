<?php

use Webfox\AzureOpenAI\Resources\FineTuning;
use Webfox\AzureOpenAI\Responses\FineTuning\ListJobEventsResponse;
use Webfox\AzureOpenAI\Responses\FineTuning\ListJobsResponse;
use Webfox\AzureOpenAI\Responses\FineTuning\RetrieveJobResponse;
use Webfox\AzureOpenAI\Testing\ClientFake;

it('records a fine tuning job create request', function () {
    $fake = new ClientFake([
        RetrieveJobResponse::fake(),
    ]);

    $fake->fineTuning()->createJob([
        'training_file' => 'file-abc123',
        'model' => 'gpt-3.5-turbo-0613',
    ]);

    $fake->assertSent(FineTuning::class, function ($method, $parameters) {
        return $method === 'createJob' &&
            $parameters['model'] === 'gpt-3.5-turbo-0613' &&
            $parameters['training_file'] === 'file-abc123';
    });
});

it('records a fine tuning job retrieve request', function () {
    $fake = new ClientFake([
        RetrieveJobResponse::fake(),
    ]);

    $fake->fineTuning()->retrieveJob('ft-AF1WoRqd3aJAHsqc9NY7iL8F');

    $fake->assertSent(FineTuning::class, function ($method, $parameters) {
        return $method === 'retrieveJob' &&
            $parameters === 'ft-AF1WoRqd3aJAHsqc9NY7iL8F';
    });
});

it('records a fine tuning job cancel request', function () {
    $fake = new ClientFake([
        RetrieveJobResponse::fake(),
    ]);

    $fake->fineTuning()->cancelJob('ft-AF1WoRqd3aJAHsqc9NY7iL8F');

    $fake->assertSent(FineTuning::class, function ($method, $parameters) {
        return $method === 'cancelJob' &&
            $parameters === 'ft-AF1WoRqd3aJAHsqc9NY7iL8F';
    });
});

it('records a fine tuning job list request', function () {
    $fake = new ClientFake([
        ListJobsResponse::fake(),
    ]);

    $fake->fineTuning()->listJobs();

    $fake->assertSent(FineTuning::class, function ($method) {
        return $method === 'listJobs';
    });
});

it('records a fine tuning list job events request', function () {
    $fake = new ClientFake([
        ListJobEventsResponse::fake(),
    ]);

    $fake->fineTuning()->listJobEvents('ft-AF1WoRqd3aJAHsqc9NY7iL8F');

    $fake->assertSent(FineTuning::class, function ($method, $parameters) {
        return $method === 'listJobEvents' &&
            $parameters === 'ft-AF1WoRqd3aJAHsqc9NY7iL8F';
    });
});
