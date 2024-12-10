<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\ThreadsRunsStepsContract;
use Webfox\AzureOpenAI\Resources\ThreadsRunsSteps;
use Webfox\AzureOpenAI\Responses\Threads\Runs\Steps\ThreadRunStepListResponse;
use Webfox\AzureOpenAI\Responses\Threads\Runs\Steps\ThreadRunStepResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

class ThreadsRunsStepsTestResource implements ThreadsRunsStepsContract
{
    use Testable;

    public function resource(): string
    {
        return ThreadsRunsSteps::class;
    }

    public function retrieve(string $threadId, string $runId, string $stepId): ThreadRunStepResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function list(string $threadId, string $runId, array $parameters = []): ThreadRunStepListResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
