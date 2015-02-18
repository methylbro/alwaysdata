<?php

namespace Methylbro\Alwaysdata\Model;

/**
 *
 */
class Product implements ProductInterface
{
    private $href;
    private $id;
    private $name;
    private $verbose_name;

    public function __construct($href = null, $id = null)
    {
        $this->id = $id;
        $this->href = $href;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getHref()
    {
        return $this->href;
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

    public function setVerboseName($verbose_name)
    {
        $this->verbose_name = $verbose_name;

        return $this;
    }

    public function getVerboseName()
    {
        return $this->verbose_name;
    }
}
