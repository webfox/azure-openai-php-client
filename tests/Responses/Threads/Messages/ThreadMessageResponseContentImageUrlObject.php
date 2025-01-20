<?php

use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseContentImageUrl;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseContentImageUrlObject;

test('from', function () {
    $result = ThreadMessageResponseContentImageUrlObject::from(threadMessageResource()['content'][2]);

    expect($result)
        ->type->toBe('image_url')
        ->imageFile->toBeInstanceOf(ThreadMessageResponseContentImageUrl::class);
});

test('as array accessible', function () {
    $result = ThreadMessageResponseContentImageUrlObject::from(threadMessageResource()['content'][2]);

    expect($result['type'])
        ->toBe('image_url')
        ->and($result['image_url'])
        ->toBeArray();
});

test('to array', function () {
    $result = ThreadMessageResponseContentImageUrlObject::from(threadMessageResource()['content'][2]);

    expect($result->toArray())
        ->toBe(threadMessageResource()['content'][2]);
});
