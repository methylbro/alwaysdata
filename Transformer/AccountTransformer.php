<?php

namespace Methylbro\Alwaysdata\Transformer;

use Methylbro\Alwaysdata\Model\ProductManager;
use Methylbro\Alwaysdata\Model\LocationManager;

class AccountTransformer
{
    private $product_manager;
    private $location_manager;

    public function __construct(ProductManager $product_manager, LocationManager $location_manager)
    {
        $this->product_manager  = $product_manager;
        $this->location_manager = $location_manager;
    }

    public function arrayToObject($data, $manager)
    {
        $location = $this->location_manager->findByHref($data['location']['href']);

        $account = $manager
            ->create($data['href'], $data['id'], $data['name'], $location)
            ->setPeriod($data['period'])
            ->setProduct($this->product_manager->findByHref($data['product']['href']))
        ;

        return $account;
    }

    public function objectToArray($account)
    {}
}
