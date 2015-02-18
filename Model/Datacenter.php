<?php

namespace Methylbro\Alwaysdata\Model;

class Datacenter implements DatacenterInterface
{
    private $href;
    private $id;
    private $name;
    private $country;

    public function __construct($href = null, $id = null)
    {
        $this->href = $href;
        $this->id = $id;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }
}
