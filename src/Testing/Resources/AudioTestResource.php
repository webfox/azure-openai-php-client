<?php

namespace Webfox\OpenAI\Testing\Resources;

use Webfox\OpenAI\Contracts\Resources\AudioContract;
use Webfox\OpenAI\Resources\Audio;
use Webfox\OpenAI\Responses\Audio\SpeechStreamResponse;
use Webfox\OpenAI\Responses\Audio\TranscriptionResponse;
use Webfox\OpenAI\Responses\Audio\TranslationResponse;
use Webfox\OpenAI\Testing\Resources\Concerns\Testable;

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
