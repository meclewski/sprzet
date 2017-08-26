<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Equipment
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipmentRepository")
 */
class Equipment
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
     * @ORM\Column(name="inventory_nr", type="string", length=10, nullable=true)
     */
    private $inventoryNr;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_nr", type="string", length=50, nullable=true)
     */
    private $serialNr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="verification_date", type="date")
     */
    private $verificationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_to_verification", type="integer")
     */
    private $timeToVerification;

    /**
     * @var string
     *
     * @ORM\Column(name="verification_result", type="string", length=50, nullable=true)
     */
    private $verificationResult;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="production_date", type="date", nullable=true)
     */
    private $productionDate;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="eng_id", type="integer")
     */
    private $engId;

    /**
     * @var int
     *
     * @ORM\Column(name="place_id", type="integer")
     */
    private $placeId;

    

    /**
     * @var bool
     *
     * @ORM\Column(name="if_used", type="boolean")
     */
    private $ifUsed;


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
   


    /**
     * Set inventoryNr
     *
     * @param string $inventoryNr
     *
     * @return Equipment
     */
    public function setInventoryNr($inventoryNr)
    {
        $this->inventoryNr = $inventoryNr;

        return $this;
    }

    /**
     * Get inventoryNr
     *
     * @return string
     */
    public function getInventoryNr()
    {
        return $this->inventoryNr;
    }

    /**
     * Set serialNr
     *
     * @param string $serialNr
     *
     * @return Equipment
     */
    public function setSerialNr($serialNr)
    {
        $this->serialNr = $serialNr;

        return $this;
    }

    /**
     * Get serialNr
     *
     * @return string
     */
    public function getSerialNr()
    {
        return $this->serialNr;
    }

    /**
     * Set verificationDate
     *
     * @param \DateTime $verificationDate
     *
     * @return Equipment
     */
    public function setVerificationDate($verificationDate)
    {
        $this->verificationDate = $verificationDate;

        return $this;
    }

    
    /**
     * Get verificationDate
     *
     * @return \DateTime
     */
    public function getVerificationDate()
    {
        return $this->verificationDate;
    }

     /**
     * Set timeToVerification
     *
     * @param integer $timeToVerification
     *
     * @return Equipment
     */
    public function setTimeToVerification($timeToVerification)
    {
        $this->timeToVerification = $timeToVerification;

        return $this;
    }

    /**
     * Get timeToVerification
     *
     * @return integer
     */
    public function getTimeToVerification()
    {
        return $this->timeToVerification;
    }

    /**
     * Set verificationResult
     *
     * @param string $verificationResult
     *
     * @return Equipment
     */
    public function setVerificationResult($verificationResult)
    {
        $this->verificationResult = $verificationResult;

        return $this;
    }

    /**
     * Get verificationResult
     *
     * @return string
     */
    public function getVerificationResult()
    {
        return $this->verificationResult;
    }

    /**
     * Set productionDate
     *
     * @param \DateTime $productionDate
     *
     * @return Equipment
     */
    public function setProductionDate($productionDate)
    {
        $this->productionDate = $productionDate;

        return $this;
    }

    /**
     * Get productionDate
     *
     * @return \DateTime
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Equipment
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set engId
     *
     * @param integer $engId
     *
     * @return Equipment
     */
    public function setEngId($engId)
    {
        $this->engId = $engId;

        return $this;
    }

    /**
     * Get engId
     *
     * @return int
     */
    public function getEngId()
    {
        return $this->engId;
    }

    /**
     * Set placeId
     *
     * @param integer $placeId
     *
     * @return Equipment
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;

        return $this;
    }

    /**
     * Get placeId
     *
     * @return int
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }

 


    /**
     * Set ifUsed
     *
     * @param boolean $ifUsed
     *
     * @return Equipment
     */
    public function setIfUsed($ifUsed)
    {
        $this->ifUsed = $ifUsed;

        return $this;
    }

    /**
     * Get ifUsed
     *
     * @return bool
     */
    public function getIfUsed()
    {
        return $this->ifUsed;
    }

     /**
     * Many Equipments have One Etype.
     * @ORM\ManyToOne(targetEntity="Etype", inversedBy="equipments")
     * @ORM\JoinColumn(name="etype_id", referencedColumnName="id")
     */
    private $etype;

    /**
     * Set etype
     *
     * @param \AppBundle\Entity\Etype $etype
     *
     * @return Equipment
     */
    public function setEtype(\AppBundle\Entity\Etype $etype = null)
    {
        $this->etype = $etype;

        return $this;
    }

    /**
     * Get etype
     *
     * @return \AppBundle\Entity\Etype
     */
    public function getEtype()
    {
        return $this->etype;
    }
}
