<?php

namespace Methylbro\Alwaysdata\Transformer;

class ProductTransformer
{
    public function arrayToObject($data, $manager)
    {
        $product = $manager
            ->create($data['href'], $data['id'])
            ->setName($data['name'])
            ->setVerboseName($data['verbose_name'])
        ;

        return $product;
    }
}
