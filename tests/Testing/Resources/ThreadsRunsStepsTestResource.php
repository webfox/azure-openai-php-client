<?php

use Webfox\OpenAI\Resources\ThreadsRunsSteps;
use Webfox\OpenAI\Responses\Threads\Runs\Steps\ThreadRunStepListResponse;
use Webfox\OpenAI\Responses\Threads\Runs\Steps\ThreadRunStepResponse;
use Webfox\OpenAI\Testing\ClientFake;

it('records a thread run step retrieve request', function () {
    $fake = new ClientFake([
        ThreadRunStepResponse::fake(),
    ]);

    $fake->threads()->runs()->steps()->retrieve(
        threadId: 'thread_tKFLqzRN9n7MnyKKvc1Q7868',
        runId: 'run_4RCYyYzX9m41WQicoJtUQAb8',
        stepId: 'step_1spQXgbAabXFm1YXrwiGIMUz',
    );

    $fake->assertSent(ThreadsRunsSteps::class, function ($method, $threadId, $runId, $stepId) {
        return $method === 'retrieve' &&
            $threadId === 'thread_tKFLqzRN9n7MnyKKvc1Q7868' &&
            $runId === 'run_4RCYyYzX9m41WQicoJtUQAb8' &&
            $stepId === 'step_1spQXgbAabXFm1YXrwiGIMUz';
    });
});

it('records a thread run step list request', function () {
    $fake = new ClientFake([
        ThreadRunStepListResponse::fake(),
    ]);

    $fake->threads()->runs()->steps()->list(
        threadId: 'thread_tKFLqzRN9n7MnyKKvc1Q7868',
        runId: 'run_4RCYyYzX9m41WQicoJtUQAb8',
        parameters: [
            'limit' => 10,
        ],
    );

    $fake->assertSent(ThreadsRunsSteps::class, function ($method, $threadId, $runId, $parameters) {
        return $method === 'list' &&
            $threadId === 'thread_tKFLqzRN9n7MnyKKvc1Q7868' &&
            $runId === 'run_4RCYyYzX9m41WQicoJtUQAb8' &&
            $parameters['limit'] === 10;
    });
});
