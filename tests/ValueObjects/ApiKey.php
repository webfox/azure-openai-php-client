<?php

// Generate test for API key value object...

use Webfox\OpenAI\ValueObjects\ApiKey;

it('can be created from a string', function () {
    $apiKey = ApiKey::from('foo');

    expect($apiKey->toString())->toBe('foo');
});
