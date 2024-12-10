<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\FineTuningContract;
use Webfox\AzureOpenAI\Resources\FineTuning;
use Webfox\AzureOpenAI\Responses\FineTuning\ListJobEventsResponse;
use Webfox\AzureOpenAI\Responses\FineTuning\ListJobsResponse;
use Webfox\AzureOpenAI\Responses\FineTuning\RetrieveJobResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class FineTuningTestResource implements FineTuningContract
{
    use Testable;

    protected function resource(): string
    {
        return FineTuning::class;
    }

    public function createJob(array $parameters): RetrieveJobResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function listJobs(array $parameters = []): ListJobsResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieveJob(string $jobId): RetrieveJobResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function cancelJob(string $jobId): RetrieveJobResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function listJobEvents(string $jobId, array $parameters = []): ListJobEventsResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
