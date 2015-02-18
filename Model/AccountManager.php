<?php

namespace Methylbro\Alwaysdata\Model;

use Methylbro\Alwaysdata\Client;
use Methylbro\Alwaysdata\Transformer\AccountTransformer;

class AccountManager
{
    public function __construct(Client $client, AccountTransformer $transformer)
    {
        $this->client      = $client;
        $this->transformer = $transformer;
    }

    public function create($href = null, $id = null, $name = null, $location = null)
    {
        return new Account($href, $id, $name, $location);
    }

    public function findAll()
    {
        $data = $this->client->get('account/');

        $sites = [];
        foreach ($data as $row) {
            $sites[] = $this->transformer->arrayToObject($row, $this);
        }

        return $sites;
    }

}
