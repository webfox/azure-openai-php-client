<?php

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Webfox\AzureOpenAI\Responses\FineTunes\ListEventsResponse;
use Webfox\AzureOpenAI\Responses\FineTunes\ListResponse;
use Webfox\AzureOpenAI\Responses\FineTunes\RetrieveResponse;
use Webfox\AzureOpenAI\Responses\FineTunes\RetrieveResponseEvent;
use Webfox\AzureOpenAI\Responses\FineTunes\RetrieveResponseFile;
use Webfox\AzureOpenAI\Responses\FineTunes\RetrieveResponseHyperparams;
use Webfox\AzureOpenAI\Responses\FineTunes\RetrieveStreamedResponseEvent;
use Webfox\AzureOpenAI\Responses\Meta\MetaInformation;
use Webfox\AzureOpenAI\Responses\StreamResponse;

test('create', function () {
    $client = mockClient('POST', 'fine-tunes', [
        'training_file' => 'file-XjGxS3KTG0uNmNOK362iJua3',
        'validation_file' => 'file-XjGxS3KTG0uNmNOK362iJua3',
        'model' => 'curie',
        'n_epochs' => 4,
        'batch_size' => null,
        'learning_rate_multiplier' => null,
        'prompt_loss_weight' => 0.01,
        'compute_classification_metrics' => false,
        'classification_n_classes' => null,
        'classification_positive_class' => null,
        'classification_betas' => [],
        'suffix' => null,
    ], \Webfox\AzureOpenAI\ValueObjects\Transporter\Response::from(fineTuneResource(), metaHeaders()));

    $result = $client->fineTunes()->create([
        'training_file' => 'file-XjGxS3KTG0uNmNOK362iJua3',
        'validation_file' => 'file-XjGxS3KTG0uNmNOK362iJua3',
        'model' => 'curie',
        'n_epochs' => 4,
        'batch_size' => null,
        'learning_rate_multiplier' => null,
        'prompt_loss_weight' => 0.01,
        'compute_classification_metrics' => false,
        'classification_n_classes' => null,
        'classification_positive_class' => null,
        'classification_betas' => [],
        'suffix' => null,
    ]);

    expect($result)
        ->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe('ft-AF1WoRqd3aJAHsqc9NY7iL8F')
        ->object->toBe('fine-tune')
        ->model->toBe('curie')
        ->createdAt->toBe(1614807352)
        ->events->toBeArray()->toHaveCount(2)
        ->events->each->toBeInstanceOf(RetrieveResponseEvent::class)
        ->fineTunedModel->toBe('curie => ft-acmeco-2021-03-03-21-44-20')
        ->hyperparams->toBeInstanceOf(RetrieveResponseHyperparams::class)
        ->organizationId->toBe('org-jwe45798ASN82s')
        ->resultFiles->toBeArray()->toHaveCount(2)
        ->resultFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->status->toBe('succeeded')
        ->validationFiles->toBeArray()->toHaveCount(2)
        ->validationFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->trainingFiles->toBeArray()->toHaveCount(2)
        ->trainingFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->updatedAt->toBe(1614807865);

    expect($result->meta())
        ->toBeInstanceOf(MetaInformation::class);
});

test('list', function () {
    $client = mockClient('GET', 'fine-tunes', [], \Webfox\AzureOpenAI\ValueObjects\Transporter\Response::from(fineTuneListResource(), metaHeaders()));

    $result = $client->fineTunes()->list();

    expect($result)
        ->toBeInstanceOf(ListResponse::class)
        ->data->toBeArray()->toHaveCount(2)
        ->data->each->toBeInstanceOf(RetrieveResponse::class);

    expect($result->meta())
        ->toBeInstanceOf(MetaInformation::class);
});

test('retrieve', function () {
    $client = mockClient('GET', 'fine-tunes/ft-AF1WoRqd3aJAHsqc9NY7iL8F', [], \Webfox\AzureOpenAI\ValueObjects\Transporter\Response::from(fineTuneResource(), metaHeaders()));

    $result = $client->fineTunes()->retrieve('ft-AF1WoRqd3aJAHsqc9NY7iL8F');

    expect($result)
        ->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe('ft-AF1WoRqd3aJAHsqc9NY7iL8F')
        ->object->toBe('fine-tune')
        ->model->toBe('curie')
        ->createdAt->toBe(1614807352)
        ->events->toBeArray()->toHaveCount(2)
        ->events->each->toBeInstanceOf(RetrieveResponseEvent::class)
        ->fineTunedModel->toBe('curie => ft-acmeco-2021-03-03-21-44-20')
        ->hyperparams->toBeInstanceOf(RetrieveResponseHyperparams::class)
        ->organizationId->toBe('org-jwe45798ASN82s')
        ->resultFiles->toBeArray()->toHaveCount(2)
        ->resultFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->status->toBe('succeeded')
        ->validationFiles->toBeArray()->toHaveCount(2)
        ->validationFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->trainingFiles->toBeArray()->toHaveCount(2)
        ->trainingFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->updatedAt->toBe(1614807865);

    expect($result->events[0])
        ->toBeInstanceOf(RetrieveResponseEvent::class)
        ->object->toBe('fine-tune-event')
        ->createdAt->toBe(1614807352)
        ->level->toBe('info')
        ->message->toBe('Job enqueued. Waiting for jobs ahead to complete. Queue number =>  0.');

    expect($result->resultFiles[0])
        ->toBeInstanceOf(RetrieveResponseFile::class)
        ->id->toBe('file-XjGxS3KTG0uNmNOK362iJua3')
        ->object->toBe('file')
        ->bytes->toBe(140)
        ->createdAt->toBe(1613779121)
        ->filename->toBe('mydata.jsonl')
        ->purpose->toBe('fine-tune');

    expect($result->hyperparams)
        ->toBeInstanceOf(RetrieveResponseHyperparams::class)
        ->batchSize->toBe(4)
        ->learningRateMultiplier->toBe(0.1)
        ->nEpochs->toBe(4)
        ->promptLossWeight->toBe(0.1);

    expect($result->meta())
        ->toBeInstanceOf(MetaInformation::class);
});

test('cancel', function () {
    $client = mockClient('POST', 'fine-tunes/ft-AF1WoRqd3aJAHsqc9NY7iL8F/cancel', [], \Webfox\AzureOpenAI\ValueObjects\Transporter\Response::from([...fineTuneResource(), 'status' => 'cancelled'], metaHeaders()));

    $result = $client->fineTunes()->cancel('ft-AF1WoRqd3aJAHsqc9NY7iL8F');

    expect($result)
        ->toBeInstanceOf(RetrieveResponse::class)
        ->id->toBe('ft-AF1WoRqd3aJAHsqc9NY7iL8F')
        ->object->toBe('fine-tune')
        ->model->toBe('curie')
        ->createdAt->toBe(1614807352)
        ->events->toBeArray()->toHaveCount(2)
        ->events->each->toBeInstanceOf(RetrieveResponseEvent::class)
        ->fineTunedModel->toBe('curie => ft-acmeco-2021-03-03-21-44-20')
        ->hyperparams->toBeInstanceOf(RetrieveResponseHyperparams::class)
        ->organizationId->toBe('org-jwe45798ASN82s')
        ->resultFiles->toBeArray()->toHaveCount(2)
        ->resultFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->status->toBe('cancelled')
        ->validationFiles->toBeArray()->toHaveCount(2)
        ->validationFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->trainingFiles->toBeArray()->toHaveCount(2)
        ->trainingFiles->each->toBeInstanceOf(RetrieveResponseFile::class)
        ->updatedAt->toBe(1614807865);

    expect($result->meta())
        ->toBeInstanceOf(MetaInformation::class);
});

test('list events', function () {
    $client = mockClient('GET', 'fine-tunes/ft-AF1WoRqd3aJAHsqc9NY7iL8F/events', [], \Webfox\AzureOpenAI\ValueObjects\Transporter\Response::from(fineTuneListEventsResource(), metaHeaders()));

    $result = $client->fineTunes()->listEvents('ft-AF1WoRqd3aJAHsqc9NY7iL8F');

    expect($result)
        ->toBeInstanceOf(ListEventsResponse::class)
        ->data->toBeArray()->toHaveCount(2)
        ->data->each->toBeInstanceOf(RetrieveResponseEvent::class);

    expect($result->data[0])
        ->toBeInstanceOf(RetrieveResponseEvent::class)
        ->object->toBe('fine-tune-event')
        ->createdAt->toBe(1614807352)
        ->level->toBe('info')
        ->message->toBe('Job enqueued. Waiting for jobs ahead to complete. Queue number =>  0.');

    expect($result->meta())
        ->toBeInstanceOf(MetaInformation::class);
});

test('list events streamed', function () {
    $response = new Response(
        body: new Stream(fineTuneListEventsStream()),
        headers: metaHeaders(),
    );

    $client = mockStreamClient('GET', 'fine-tunes/ft-MaoEAULREoazpupm8uB7qoIl/events', ['stream' => 'true'], $response);

    $result = $client->fineTunes()->listEventsStreamed('ft-MaoEAULREoazpupm8uB7qoIl');

    expect($result)
        ->toBeInstanceOf(StreamResponse::class)
        ->toBeInstanceOf(IteratorAggregate::class);

    expect($result->getIterator())
        ->toBeInstanceOf(Iterator::class);

    expect(iterator_to_array($result)[0])
        ->toBeInstanceOf(RetrieveStreamedResponseEvent::class)
        ->object->toBe('fine-tune-event')
        ->createdAt->toBe(1678253295)
        ->level->toBe('info')
        ->message->toBe('Created fine-tune: ft-MaoEAULREoazpupm8uB7qoIl');

    expect($result->meta())
        ->toBeInstanceOf(MetaInformation::class);
});
