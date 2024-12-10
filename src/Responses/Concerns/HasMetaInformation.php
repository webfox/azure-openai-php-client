<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Concerns;

use Webfox\AzureOpenAI\Responses\Meta\MetaInformation;

trait HasMetaInformation
{
    public function meta(): MetaInformation
    {
        return $this->meta;
    }
}
