<?php

use Webfox\OpenAI\Responses\Threads\Messages\ThreadMessageResponseContentText;
use Webfox\OpenAI\Responses\Threads\Messages\ThreadMessageResponseContentTextObject;

test('from', function () {
    $result = ThreadMessageResponseContentTextObject::from(threadMessageResource()['content'][0]);

    expect($result)
        ->type->toBe('text')
        ->text->toBeInstanceOf(ThreadMessageResponseContentText::class);
});

test('as array accessible', function () {
    $result = ThreadMessageResponseContentTextObject::from(threadMessageResource()['content'][0]);

    expect($result['type'])
        ->toBe('text');
});

test('to array', function () {
    $result = ThreadMessageResponseContentTextObject::from(threadMessageResource()['content'][0]);

    expect($result->toArray())
        ->toBe(threadMessageResource()['content'][0]);
});
