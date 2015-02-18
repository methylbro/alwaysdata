<?php

namespace Methylbro\Alwaysdata\Model;

interface ServerInterface
{
    public function getHref();

    public function getId();

    public function setName($name);

    public function getName();

    public function setDatacenter(DatacenterInterface $datacenter);

    public function getDatacenter();
}
