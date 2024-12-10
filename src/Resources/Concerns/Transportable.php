<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Resources\Concerns;

use Webfox\AzureOpenAI\Contracts\TransporterContract;

trait Transportable
{
    public function __construct(private readonly TransporterContract $transporter)
    {
        // ..
    }
}
