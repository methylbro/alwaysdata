<?php

namespace Methylbro\Alwaysdata\Model;

use Methylbro\Alwaysdata\Client;
use Methylbro\Alwaysdata\Transformer\SiteTransformer;

class SiteManager
{
    public function __construct(Client $client, SiteTransformer $transformer)
    {
        $this->client      = $client;
        $this->transformer = $transformer;
    }

    public function create($href = null, $id = null)
    {
        return new Site($href, $id);
    }

    public function update(Site $site)
    {
        $this->client->create('site/', $this->transformer->objectToArray($site));
    }

    public function delete(Site $site)
    {}

    public function findByHref($href)
    {
        $data = $this->client->get($href);
        $site = $this->transformer->arrayToObject($data, $this);

        return $site;
    }

    public function findAll()
    {
        $data = $this->client->get('site/');

        $sites = [];
        foreach ($data as $row) {
            $sites[] = $this->transformer->arrayToObject($row, $this);
        }

        return $sites;
    }
}
