<?php

use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseContentImageFile;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseContentImageFileObject;

test('from', function () {
    $result = ThreadMessageResponseContentImageFileObject::from(threadMessageResource()['content'][1]);

    expect($result)
        ->type->toBe('image_file')
        ->imageFile->toBeInstanceOf(ThreadMessageResponseContentImageFile::class);
});

test('as array accessible', function () {
    $result = ThreadMessageResponseContentImageFileObject::from(threadMessageResource()['content'][1]);

    expect($result['type'])
        ->toBe('image_file');
});

test('to array', function () {
    $result = ThreadMessageResponseContentImageFileObject::from(threadMessageResource()['content'][1]);

    expect($result->toArray())
        ->toBe(threadMessageResource()['content'][1]);
});
