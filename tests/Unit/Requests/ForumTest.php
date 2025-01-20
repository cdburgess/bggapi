<?php

use cdburgess\bggapi\Requests\Forum;

it('sets allowed parameters correctly', function () {
    $forum = new Forum();
    expect($forum->getAllowedParameters())->toBe([
        'id',
        'page',
    ]);
});

it('returns correct endpoint', function () {
    $forum = new Forum();
    expect($forum->getEndpoint())->toBe('forum');
});
