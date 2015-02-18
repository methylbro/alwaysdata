<?php

namespace Methylbro\Alwaysdata\Model;

use Methylbro\Alwaysdata\Client;
use Methylbro\Alwaysdata\Transformer\ProductTransformer;

class ProductManager
{
    public function __construct(Client $client, ProductTransformer $transformer)
    {
        $this->client      = $client;
        $this->transformer = $transformer;
    }

    public function create($href = null, $id = null)
    {
        return new Product($href, $id);
    }

    public function findByHref($href)
    {
        $data = $this->client->get($href);
        $product = $this->transformer->arrayToObject($data, $this);

        return $product;
    }

}
