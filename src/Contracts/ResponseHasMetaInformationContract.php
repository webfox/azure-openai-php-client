<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Contracts;

use Webfox\AzureOpenAI\Responses\Meta\MetaInformation;

interface ResponseHasMetaInformationContract
{
    public function meta(): MetaInformation;
}
