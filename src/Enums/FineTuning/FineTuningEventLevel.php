<?php

namespace Webfox\AzureOpenAI\Enums\FineTuning;

enum FineTuningEventLevel: string
{
    case Info = 'info';
    case Warning = 'warn';
    case Error = 'error';
}
