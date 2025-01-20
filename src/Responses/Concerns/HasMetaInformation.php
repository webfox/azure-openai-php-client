<?php

declare(strict_types=1);

namespace Webfox\OpenAI\Responses\Concerns;

use Webfox\OpenAI\Responses\Meta\MetaInformation;

trait HasMetaInformation
{
    public function meta(): MetaInformation
    {
        return $this->meta;
    }
}
