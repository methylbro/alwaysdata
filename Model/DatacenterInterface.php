<?php

namespace Methylbro\Alwaysdata\Model;

interface DatacenterInterface
{
    public function getHref();

    public function getId();

    public function setName($name);

    public function getName();

    public function setCountry($country);

    public function getCountry();
}
