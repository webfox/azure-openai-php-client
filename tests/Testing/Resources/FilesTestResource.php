<?php

use Webfox\AzureOpenAI\Resources\Files;
use Webfox\AzureOpenAI\Responses\Files\CreateResponse;
use Webfox\AzureOpenAI\Responses\Files\DeleteResponse;
use Webfox\AzureOpenAI\Responses\Files\ListResponse;
use Webfox\AzureOpenAI\Responses\Files\RetrieveResponse;
use Webfox\AzureOpenAI\Testing\ClientFake;

it('records a files retrieve request', function () {
    $fake = new ClientFake([
        RetrieveResponse::fake(),
    ]);

    $fake->files()->retrieve('file-XjGxS3KTG0uNmNOK362iJua3');

    $fake->assertSent(Files::class, function ($method, $parameters) {
        return $method === 'retrieve' &&
            $parameters === 'file-XjGxS3KTG0uNmNOK362iJua3';
    });
});

it('records a files list request', function () {
    $fake = new ClientFake([
        ListResponse::fake(),
    ]);

    $fake->files()->list();

    $fake->assertSent(Files::class, function ($method) {
        return $method === 'list';
    });
});

it('records a files download request', function () {
    $fake = new ClientFake([
        'fake-file-content',
    ]);

    $fake->files()->download('file-XjGxS3KTG0uNmNOK362iJua3');

    $fake->assertSent(Files::class, function ($method, $parameters) {
        return $method === 'download' &&
            $parameters === 'file-XjGxS3KTG0uNmNOK362iJua3';
    });
});

it('records a files delete request', function () {
    $fake = new ClientFake([
        DeleteResponse::fake(),
    ]);

    $fake->files()->delete('file-XjGxS3KTG0uNmNOK362iJua3');

    $fake->assertSent(Files::class, function ($method, $parameters) {
        return $method === 'delete' &&
            $parameters === 'file-XjGxS3KTG0uNmNOK362iJua3';
    });
});

it('records a files upload request', function () {
    $fake = new ClientFake([
        CreateResponse::fake(),
    ]);

    $fake->files()->upload([
        'purpose' => 'fine-tune',
    ]);

    $fake->assertSent(Files::class, function ($method, $parameters) {
        return $method === 'upload' &&
            $parameters['purpose'] === 'fine-tune';
    });
});
