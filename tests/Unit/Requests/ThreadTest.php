<?php

use cdburgess\bggapi\Requests\Thread;

it('sets allowed parameters correctly', function () {
    $thread = new Thread();
    expect($thread->getAllowedParameters())->toBe([
        'id',
        'minarticleid',
        'minarticledate',
        'count',
    ]);
});

it('returns correct endpoint', function () {
    $thread = new Thread();
    expect($thread->getEndpoint())->toBe('thread');
});