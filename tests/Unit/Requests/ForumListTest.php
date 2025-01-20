<?php

use cdburgess\bggapi\Requests\ForumList;

it('sets allowed parameters correctly', function () {
    $forumList = new ForumList();
    expect($forumList->getAllowedParameters())->toBe([
        'id',
        'type',
    ]);
});

it('sets allowed types correctly', function () {
    $forumList = new ForumList();
    expect($forumList->getAllowedTypes())->toBe([
        'thing',
        'family',
    ]);
});

it('returns correct endpoint', function () {
    $forumList = new ForumList();
    expect($forumList->getEndpoint())->toBe('forumlist');
});