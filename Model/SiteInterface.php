<?php

namespace Methylbro\Alwaysdata\Model;

interface SiteInterface
{
    public function getHref();

    public function getId();

    public function setName($name);

    public function getName();

    public function setType(SiteTypeInterface $type);

    public function getType();

    public function setPath($path = '/www/');

    public function getPath();

    public function addAddress($address);

    public function removeAddress($address);

    public function getAddresses();
}
