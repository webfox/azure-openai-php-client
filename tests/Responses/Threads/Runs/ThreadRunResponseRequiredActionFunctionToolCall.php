<?php

use Webfox\AzureOpenAI\Responses\Threads\Runs\ThreadRunResponseRequiredActionFunctionToolCall;
use Webfox\AzureOpenAI\Responses\Threads\Runs\ThreadRunResponseRequiredActionFunctionToolCallFunction;

test('from', function () {
    $result = ThreadRunResponseRequiredActionFunctionToolCall::from(threadRunWithSubmitToolOutputsResource()['required_action']['submit_tool_outputs']['tool_calls'][0]);

    expect($result)
        ->id->toBe('call_KSg14X7kZF2WDzlPhpQ168Mj')
        ->type->toBe('function')
        ->function->toBeInstanceOf(ThreadRunResponseRequiredActionFunctionToolCallFunction::class);
});

test('as array accessible', function () {
    $result = ThreadRunResponseRequiredActionFunctionToolCall::from(threadRunWithSubmitToolOutputsResource()['required_action']['submit_tool_outputs']['tool_calls'][0]);

    expect($result['type'])
        ->toBe('function');
});

test('to array', function () {
    $result = ThreadRunResponseRequiredActionFunctionToolCall::from(threadRunWithSubmitToolOutputsResource()['required_action']['submit_tool_outputs']['tool_calls'][0]);

    expect($result->toArray())
        ->toBe(threadRunWithSubmitToolOutputsResource()['required_action']['submit_tool_outputs']['tool_calls'][0]);
});
