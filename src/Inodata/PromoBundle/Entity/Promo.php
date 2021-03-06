<?php

namespace Inodata\PromoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promo
 *
 * @ORM\Table(name="ino_promo")
 * @ORM\Entity
 */
class Promo
{
    /**
     * @var integer
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
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\OneToMany(targetEntity="Promocode", mappedBy="Promo")
     */
    private $promocodes;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Promo
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
     * Set filename
     *
     * @param string $filename
     * @return Promo
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    
        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promocodes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
    *Return object as string to persist related models
    *
    *@return string
    **/
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Add promocodes
     *
     * @param \Inodata\PromoBundle\Entity\Promocode $promocodes
     * @return Promo
     */
    public function addPromocode(\Inodata\PromoBundle\Entity\Promocode $promocodes)
    {
        $this->promocodes[] = $promocodes;
    
        return $this;
    }

    /**
     * Remove promocodes
     *
     * @param \Inodata\PromoBundle\Entity\Promocode $promocodes
     */
    public function removePromocode(\Inodata\PromoBundle\Entity\Promocode $promocodes)
    {
        $this->promocodes->removeElement($promocodes);
    }

    /**
     * Get promocodes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromocodes()
    {
        return $this->promocodes;
    }
}