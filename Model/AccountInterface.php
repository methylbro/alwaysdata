<?php

namespace Methylbro\Alwaysdata\Model;

/**
 *
 */
interface AccountInterface
{
    public function getHref();

    public function getId();

    public function getName();

    public function setProduct(ProductInterface $product);

    public function getProduct();

    public function setPeriod($period);

    public function getPeriod();

    public function getLocation();
}
