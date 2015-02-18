<?php

namespace Methylbro\Alwaysdata\Model;

/**
 *
 */
class Account implements AccountInterface
{
    private $href;
    private $id;
    private $name;
    private $product;
    private $period;
    private $location;

    public function __construct($href = null, $id = null, $name = null, $location = null)
    {
        $this->href = $href;
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;

        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setPeriod($period)
    {
        $list = ['1mo', '1y'];

        if (in_array($period, $list)) {
            $this->period = $period;
        } else {
            throw new \InvalidArgumentException();
        }

        return $this;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function getLocation()
    {
        return $this->location;
    }
}
