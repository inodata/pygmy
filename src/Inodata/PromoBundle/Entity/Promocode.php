<?php

namespace Inodata\PromoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promocode
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Promocode
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
     *@var string
     * @ORM\Column(name="confirmation_token", type="string", length=255, nullable=false)
     */
    private $confirmation_token;

    /**
     *@var integer
     * @ORM\Column(name="downloads", type="integer", nullable=false)
     */
    private $downloads;

    /**
     *@var boolean
     * @ORM\Column(name="is_valid", type="boolean", nullable=false)
     */
    private $is_valid;

    /**
    *@ORM\ManyToOne(targetEntity="Promo")
    *@ORM\JoinColumn(name="promo_id", referencedColumnName="id")
    **/
    private $promo;

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
     * Set confirmation_token
     *
     * @param string $confirmationToken
     * @return Promocode
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmation_token = $confirmationToken;
    
        return $this;
    }

    /**
     * Get confirmation_token
     *
     * @return string 
     */
    public function getConfirmationToken()
    {
        return $this->confirmation_token;
    }

    /**
     * Set downloads
     *
     * @param integer $downloads
     * @return Promocode
     */
    public function setDownloads($downloads)
    {
        $this->downloads = $downloads;
    
        return $this;
    }

    /**
     * Get downloads
     *
     * @return integer 
     */
    public function getDownloads()
    {
        return $this->downloads;
    }

    /**
     * Set is_valid
     *
     * @param boolean $isValid
     * @return Promocode
     */
    public function setIsValid($isValid)
    {
        $this->is_valid = $isValid;
    
        return $this;
    }

    /**
     * Get is_valid
     *
     * @return boolean 
     */
    public function getIsValid()
    {
        return $this->is_valid;
    }

    /**
     * Set promo_id
     *
     * @param \Inodata\PromoBundle\Entity\Promo $promoId
     * @return Promocode
     */
    public function setPromoId(\Inodata\PromoBundle\Entity\Promo $promoId = null)
    {
        $this->promo_id = $promoId;
    
        return $this;
    }

    /**
     * Get promo_id
     *
     * @return \Inodata\PromoBundle\Entity\Promo 
     */
    public function getPromoId()
    {
        return $this->promo_id;
    }

    /**
     * Set promo
     *
     * @param \Inodata\PromoBundle\Entity\Promo $promo
     * @return Promocode
     */
    public function setPromo(\Inodata\PromoBundle\Entity\Promo $promo = null)
    {
        $this->promo = $promo;
    
        return $this;
    }

    /**
     * Get promo
     *
     * @return \Inodata\PromoBundle\Entity\Promo 
     */
    public function getPromo()
    {
        return $this->promo;
    }
}