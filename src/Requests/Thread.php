<?php

namespace cdburgess\bggapi\Requests;

/**
 * Class Thread
 *
 * @method $this id(int $value)
 * @method $this minarticleid(int $value)
 * @method $this minarticledate(string $value)
 * @method $this count(int $value)
 * https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc8
 */
class Thread extends RequestBuilder
{

    public function __construct()
    {
        $this->setAllowedParameters([
            'id',
            'minarticleid',
            'minarticledate',
            'count',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'thread';
    }
}
