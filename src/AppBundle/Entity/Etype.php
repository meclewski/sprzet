<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Etype
 *
 * @ORM\Table(name="etype")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtypeRepository")
 */
class Etype
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
     * @ORM\Column(name="e_type", type="string", length=50, unique=true)
     */
    private $eType;

    /**
     * @var int
     *
     * @ORM\Column(name="validity_period", type="integer")
     */
    private $validityPeriod;

    /**
     * @var string
     *
     * @ORM\Column(name="e_price", type="string", length=20, nullable=true)
     */
    private $ePrice;

    /**
     * @var int
     *
     * @ORM\Column(name="producer_id", type="integer")
     */
    private $producerId;

    /**
     * @var int
     *
     * @ORM\Column(name="laboratory_id", type="integer")
     */
    private $laboratoryId;

    /**
     * @var int
     *
     * @ORM\Column(name="verification_id", type="integer")
     */
    private $verificationId;

    /**
     * @var int
     *
     * @ORM\Column(name="emodel_id", type="integer")
     */
    private $emodelId;

    public function __toString(){
        return $this->eType;
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
     * Set eType
     *
     * @param string $eType
     *
     * @return Etype
     */
    public function setEType($eType)
    {
        $this->eType = $eType;

        return $this;
    }

    /**
     * Get eType
     *
     * @return string
     */
    public function getEType()
    {
        return $this->eType;
    }

    /**
     * Set validityPeriod
     *
     * @param integer $validityPeriod
     *
     * @return Etype
     */
    public function setValidityPeriod($validityPeriod)
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * Get validityPeriod
     *
     * @return int
     */
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }

    /**
     * Set ePrice
     *
     * @param string $ePrice
     *
     * @return Etype
     */
    public function setEPrice($ePrice)
    {
        $this->ePrice = $ePrice;

        return $this;
    }

    /**
     * Get ePrice
     *
     * @return string
     */
    public function getEPrice()
    {
        return $this->ePrice;
    }

    /**
     * Set producerId
     *
     * @param integer $producerId
     *
     * @return Etype
     */
    public function setProducerId($producerId)
    {
        $this->producerId = $producerId;

        return $this;
    }

    /**
     * Get producerId
     *
     * @return int
     */
    public function getProducerId()
    {
        return $this->producerId;
    }

    /**
     * Set laboratoryId
     *
     * @param integer $laboratoryId
     *
     * @return Etype
     */
    public function setLaboratoryId($laboratoryId)
    {
        $this->laboratoryId = $laboratoryId;

        return $this;
    }

    /**
     * Get laboratoryId
     *
     * @return int
     */
    public function getLaboratoryId()
    {
        return $this->laboratoryId;
    }

    /**
     * Set verificationId
     *
     * @param integer $verificationId
     *
     * @return Etype
     */
    public function setVerificationId($verificationId)
    {
        $this->verificationId = $verificationId;

        return $this;
    }

    /**
     * Get verificationId
     *
     * @return int
     */
    public function getVerificationId()
    {
        return $this->verificationId;
    }

    /**
     * Set emodelId
     *
     * @param integer $emodelId
     *
     * @return Etype
     */
    public function setEmodelId($emodelId)
    {
        $this->emodelId = $emodelId;

        return $this;
    }

    /**
     * Get emodelId
     *
     * @return int
     */
    public function getEmodelId()
    {
        return $this->emodelId;
    }


    // ...
    /**
     * One Etype has Many Equipments.
     * @ORM\OneToMany(targetEntity="Equipment", mappedBy="etype")
     */
    private $equipments;
    // ...

    public function __construct() {
        $this->equipments = new ArrayCollection();
    
}

    /**
     * Add equipment
     *
     * @param \AppBundle\Entity\Equipment $equipment
     *
     * @return Etype
     */
    public function addEquipment(\AppBundle\Entity\Equipment $equipment)
    {
        $this->equipments[] = $equipment;

        return $this;
    }

    /**
     * Remove equipment
     *
     * @param \AppBundle\Entity\Equipment $equipment
     */
    public function removeEquipment(\AppBundle\Entity\Equipment $equipment)
    {
        $this->equipments->removeElement($equipment);
    }

    /**
     * Get equipments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipments()
    {
        return $this->equipments;
    }
}
