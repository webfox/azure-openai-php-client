<?php

use Webfox\AzureOpenAI\Responses\Meta\MetaInformation;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponse;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseAttachment;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseContentImageFileObject;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseContentTextObject;

test('from', function () {
    $result = ThreadMessageResponse::from(threadMessageResource(), meta());

    expect($result)
        ->id->toBe('msg_KNsDDwE41BUAHhcPNpDkdHWZ')
        ->object->toBe('thread.message')
        ->createdAt->toBe(1699623839)
        ->threadId->toBe('thread_agvtHUGezjTCt4SKgQg0NJ2Y')
        ->role->toBe('user')
        ->content->toBeArray()
        ->content->{0}->toBeInstanceOf(ThreadMessageResponseContentTextObject::class)
        ->content->{1}->toBeInstanceOf(ThreadMessageResponseContentImageFileObject::class)
        ->content->{2}->toBeInstanceOf(\Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseContentImageUrlObject::class)
        ->attachments->toBeArray()
        ->attachments->{0}->toBeInstanceOf(ThreadMessageResponseAttachment::class)
        ->assistantId->toBeNull()
        ->runId->toBeNull()
        ->metadata->toBe([])
        ->meta()->toBeInstanceOf(MetaInformation::class);
});

test('as array accessible', function () {
    $result = ThreadMessageResponse::from(threadMessageResource(), meta());

    expect($result['id'])
        ->toBe('msg_KNsDDwE41BUAHhcPNpDkdHWZ');
});

test('to array', function () {
    $result = ThreadMessageResponse::from(threadMessageResource(), meta());

    expect($result->toArray())
        ->toBe(threadMessageResource());
});

test('fake', function () {
    $response = ThreadMessageResponse::fake();

    expect($response)
        ->id->toBe('msg_KNsDDwE41BUAHhcPNpDkdHWZ');
});

test('fake with override', function () {
    $response = ThreadMessageResponse::fake([
        'id' => 'msg_1234',
    ]);

    expect($response)
        ->id->toBe('msg_1234');
});
