<?php

use Webfox\AzureOpenAI\Resources\Batches;
use Webfox\AzureOpenAI\Resources\Completions;
use Webfox\AzureOpenAI\Resources\Models;

it('has models', function () {
    $openAI = OpenAI::client('foo');

    expect($openAI->models())->toBeInstanceOf(Models::class);
});

it('has completions', function () {
    $openAI = OpenAI::client('foo');

    expect($openAI->completions())->toBeInstanceOf(Completions::class);
});

it('has batches', function () {
    $openAI = OpenAI::client('foo');

    expect($openAI->batches())->toBeInstanceOf(Batches::class);
});
