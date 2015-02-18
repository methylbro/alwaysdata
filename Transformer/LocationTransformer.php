<?php

namespace Methylbro\Alwaysdata\Transformer;

class LocationTransformer
{
    public function arrayToObject($data, $manager)
    {
        if (array_key_exists('country', $data)) {
            $location = $manager
                ->createDatacenter($data['href'], $data['id'])
                ->setName($data['name'])
                ->setCountry($data['country'])
            ;
        } else {
            $datacenter = $manager
                ->findByHref($data['datacenter']['href'])
            ;
            $location = $manager
                ->createServer($data['href'], $data['id'])
                ->setName($data['name'])
                ->setDatacenter($datacenter)
            ;
        }

        return $location;
    }
}
