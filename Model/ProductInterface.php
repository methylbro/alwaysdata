<?php

namespace Methylbro\Alwaysdata\Model;

/**
 *
 */
interface ProductInterface
{
    public function getId();

    public function getHref();

    public function setName($name);

    public function getName();

    public function setVerboseName($verbose_name);

    public function getVerboseName();
}
