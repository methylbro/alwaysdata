<?php

namespace Methylbro\Alwaysdata\Model;

use Methylbro\Alwaysdata\Client;
use Methylbro\Alwaysdata\Transformer\LocationTransformer;

class LocationManager
{
    public function __construct(Client $client, LocationTransformer $transformer)
    {
        $this->client      = $client;
        $this->transformer = $transformer;
    }

    public function createDatacenter($href = null, $id = null)
    {
        return new Datacenter($href, $id);
    }

    public function findByHref($href)
    {
        $data = $this->client->get($href);
        $product = $this->transformer->arrayToObject($data, $this);

        return $product;
    }

}
