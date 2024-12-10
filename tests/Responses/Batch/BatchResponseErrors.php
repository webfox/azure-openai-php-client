<?php

use Webfox\AzureOpenAI\Responses\Batches\BatchResponseErrors;

test('from', function () {
    $response = BatchResponseErrors::from(batchResourceWithErrors()['errors']);

    expect($response)
        ->toBeInstanceOf(BatchResponseErrors::class)
        ->object->toBe('list')
        ->data->toBeArray()
        ->data->each->toBeInstanceOf(\Webfox\AzureOpenAI\Responses\Batches\BatchResponseErrorsData::class)
        ->data->{0}->code->toBe('123');
});

test('as array accessible', function () {
    $response = BatchResponseErrors::from(batchResourceWithErrors()['errors']);

    expect($response['object'])->toBe('list');
});

test('to array', function () {
    $response = BatchResponseErrors::from(batchResourceWithErrors()['errors']);

    expect($response->toArray())
        ->toBeArray()
        ->toBe(batchResourceWithErrors()['errors']);
});
