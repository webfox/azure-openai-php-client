<?php

declare(strict_types=1);

namespace Webfox\OpenAI\Resources\Concerns;

use Webfox\OpenAI\Contracts\TransporterContract;

trait Transportable
{
    public function __construct(private readonly TransporterContract $transporter)
    {
        // ..
    }
}
