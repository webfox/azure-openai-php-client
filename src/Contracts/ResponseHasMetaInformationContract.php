<?php

declare(strict_types=1);

namespace Webfox\OpenAI\Contracts;

use Webfox\OpenAI\Responses\Meta\MetaInformation;

interface ResponseHasMetaInformationContract
{
    public function meta(): MetaInformation;
}
