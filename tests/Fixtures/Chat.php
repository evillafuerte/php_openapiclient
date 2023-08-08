<?php

/**
 * @return array<string, mixed>
 */
function chatCompletion(): array
{
    return [
        'id' => 'chatcmpl-123',
        'object' => 'chat.completion',
        'created' => 1677652288,
        'model' => 'gpt-3.5-turbo',
        'choices' => [
            [
                'index' => 0,
                'message' => [
                    'role' => 'assistant',
                    'content' => "\n\nHello there, how may I assist you today?",
                ],
                'finish_reason' => 'stop',
            ],
        ],
        'usage' => [
            'prompt_tokens' => 9,
            'completion_tokens' => 12,
            'total_tokens' => 21,
        ],
    ];
}

/**
 * @return array<string, mixed>
 */
function chatCompletionWithFunction(): array
{
    return [
        'id' => 'chatcmpl-123',
        'object' => 'chat.completion',
        'created' => 1686689333,
        'model' => 'gpt-3.5-turbo-0613',
        'choices' => [
            [
                'index' => 0,
                'message' => [
                    'role' => 'assistant',
                    'content' => null,
                    'function_call' => [
                        'name' => 'get_current_weather',
                        'arguments' => "{\n  \"location\": \"Boston, MA\"\n}",
                    ],
                ],
                'finish_reason' => 'function_call',
            ],
        ],
        'usage' => [
            'prompt_tokens' => 82,
            'completion_tokens' => 18,
            'total_tokens' => 100,
        ],
    ];
}

function chatCompletionStreamFirstChunk(): array
{
    return [
        'id' => 'chatcmpl-6wdIE4DsUtqf1srdMTsfkJp0VWZgz',
        'object' => 'chat.completion.chunk',
        'created' => 1679432086,
        'model' => 'gpt-4-0314',
        'choices' => [
            [
                'index' => 0,
                'delta' => [
                    'role' => 'assistant',
                ],
                'finish_reason' => null,
            ],
        ],
    ];
}

function chatCompletionStreamContentChunk(): array
{
    return [
        'id' => 'chatcmpl-6wdIE4DsUtqf1srdMTsfkJp0VWZgz',
        'object' => 'chat.completion.chunk',
        'created' => 1679432086,
        'model' => 'gpt-4-0314',
        'choices' => [
            [
                'index' => 0,
                'delta' => [
                    'content' => 'Hello',
                ],
                'finish_reason' => null,
            ],
        ],
    ];
}

function chatCompletionStreamFunctionCallChunk(): array
{
    return [
        'id' => 'chatcmpl-6wdIE4DsUtqf1srdMTsfkJp0VWZgz',
        'object' => 'chat.completion.chunk',
        'created' => 1679432086,
        'model' => 'gpt-4-0314',
        'choices' => [
            [
                'index' => 0,
                'delta' => [
                    'content' => null,
                    'function_call' => [
                        'name' => 'get_current_weather',
                        'arguments' => '',
                    ],
                ],
                'finish_reason' => null,
            ],
        ],
    ];
}

/**
 * @return resource
 */
function chatCompletionStream()
{
    return fopen(__DIR__.'/Streams/ChatCompletionCreate.txt', 'r');
}

/**
 * @return resource
 */
function chatCompletionStreamError()
{
    return fopen(__DIR__.'/Streams/ChatCompletionCreateError.txt', 'r');
}
