<?php

namespace Urbem\CoreBundle\Entity\Management;

/**
 * Product
 */
class Product
{
    /**
     * PK
     * @var integer
     */
    private $codProduct;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * Set codProduct
     *
     * @param integer $codProduct
     * @return Product
     */
    public function setCodProduct($codProduct)
    {
        $this->codProduct = $codProduct;
        return $this;
    }

    /**
     * Get codProduct
     *
     * @return integer
     */
    public function getCodProduct()
    {
        return $this->codProduct;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name;
    }
}
