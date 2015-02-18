<?php

namespace Methylbro\Alwaysdata\Transformer;

class SiteTransformer
{
    public function arrayToObject($data, $manager)
    {
        $site = $manager
            ->create($data['href'], $data['id'])
            ->setName($data['name'])
        ;

        foreach ($data['addresses'] as $address) {
            $site->addAddress($address);
        }

        return $site;
    }

    public function objectToArray($site)
    {
        return [
            'name'      => $site->getName(),
            'type'      => 'apache_standard',
            'path'      => $site->getPath(),
            'addresses' => $site->getAddresses(),
        ];
    }
}
