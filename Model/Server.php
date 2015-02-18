<?php

namespace Methylbro\Alwaysdata\Model;

class Server extends ServerInterface
{
    private $href;
    private $id;
    private $name;
    private $datacenter;

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

    public function setDatacenter(DatacenterInterface $datacenter)
    {
        $this->datacenter = $datacenter;

        return $this;
    }

    public function getDatacenter()
    {
        return $this->datacenter;
    }
}
