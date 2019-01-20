<?php

namespace StoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="StoreBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank()
     *
     * @Assert\Type("string")
     *
     * @Assert\Length(min=3, max=255)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="StoreBundle\Entity\Product", mappedBy="category")
     */
    private $products;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }


    /**
     * @param $product
     * @return $this
     */
    public function addProducts($product)
    {
        $this->products[] = $product;
        return $this;
    }

    /**
     * @param $product
     */
    public function removeProduct($product)
    {
        unset($this->products[$product]);
    }
}

