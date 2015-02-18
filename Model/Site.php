<?php

namespace Methylbro\Alwaysdata\Model;

/**
 *
 */
class Site implements SiteInterface
{
    /**
     *
     */
    private $href;

    /**
     *
     */
    private $id;

    /**
     *
     */
    private $name;

    /**
     *
     */
    private $type;

    /**
     *
     */
    private $path = '/www/';

    /**
     *
     */
    private $addresses = array();

    /**
     * @param string $href
     * @param integer $id
     */
    public function __construct($href = null, $id = null)
    {
        $this->href = $href;
        $this->id   = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setType(SiteTypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function setPath($path = '/www/')
    {
        $this->path = $path;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * {@inheritDoc}
     */
    public function addAddress($address)
    {
        $this->addresses[] = $address;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeAddress($address)
    {
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
}
