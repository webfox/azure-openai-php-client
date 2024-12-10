<?php

namespace Webfox\AzureOpenAI\Testing\Resources;

use Webfox\AzureOpenAI\Contracts\Resources\AudioContract;
use Webfox\AzureOpenAI\Resources\Audio;
use Webfox\AzureOpenAI\Responses\Audio\SpeechStreamResponse;
use Webfox\AzureOpenAI\Responses\Audio\TranscriptionResponse;
use Webfox\AzureOpenAI\Responses\Audio\TranslationResponse;
use Webfox\AzureOpenAI\Testing\Resources\Concerns\Testable;

final class AudioTestResource implements AudioContract
{
    use Testable;

    protected function resource(): string
    {
        return Audio::class;
    }

    public function speech(array $parameters): string
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function speechStreamed(array $parameters): SpeechStreamResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function transcribe(array $parameters): TranscriptionResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function translate(array $parameters): TranslationResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }
}
