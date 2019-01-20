<?php

namespace StoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="StoreBundle\Repository\BookingRepository")
 */
class Booking
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
     * @ORM\ManyToMany(targetEntity="StoreBundle\Entity\Product", inversedBy="orders")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="StoreBundle\Entity\Customer", mappedBy="orders")
     */
    private $customer;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bookingDate", type="datetime")
     */
    private $bookingDate;


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
     * Set customer
     *
     * @param string $customer
     *
     * @return Booking
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Booking
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set bookingDate
     *
     * @param \DateTime $bookingDate
     *
     * @return Booking
     */
    public function setBookingDate($bookingDate)
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    /**
     * Get bookingDate
     *
     * @return \DateTime
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * @return mixed
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

}

