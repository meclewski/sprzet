<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Etype
 *
 * @ORM\Table(name="etype")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtypeRepository")
 * @Vich\Uploadable
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
     * Many Producers have One Etype.
     * @ORM\ManyToOne(targetEntity="Producer", inversedBy="etypes")
     * @ORM\JoinColumn(name="producer_id", nullable=false, referencedColumnName="id")
     */
    private $producer;

    /**
     * Many Laboratories have One Etype.
     * @ORM\ManyToOne(targetEntity="Laboratory", inversedBy="etypes")
     * @ORM\JoinColumn(name="laboratory_id", nullable=false, referencedColumnName="id")
     */
    private $laboratory;

    /**
     * Many Verifications have One Etype.
     * @ORM\ManyToOne(targetEntity="Verification", inversedBy="etypes")
     * @ORM\JoinColumn(name="verification_id", nullable=false, referencedColumnName="id")
     */
    private $verification;

    /**
     * Many Functions have One Etype.
     * @ORM\ManyToOne(targetEntity="Efunction", inversedBy="etypes")
     * @ORM\JoinColumn(name="emodel_id", nullable=false, referencedColumnName="id")
     */
    private $emodel;

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

    /**
     * Set producer
     *
     * @param \AppBundle\Entity\Producer $producer
     *
     * @return Etype
     */
    public function setProducer(\AppBundle\Entity\Producer $producer)
    {
        $this->producer = $producer;

        return $this;
    }

    /**
     * Get producer
     *
     * @return \AppBundle\Entity\Producer
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * Set laboratory
     *
     * @param \AppBundle\Entity\Laboratory $laboratory
     *
     * @return Etype
     */
    public function setLaboratory(\AppBundle\Entity\Laboratory $laboratory)
    {
        $this->laboratory = $laboratory;

        return $this;
    }

    /**
     * Get laboratory
     *
     * @return \AppBundle\Entity\Laboratory
     */
    public function getLaboratory()
    {
        return $this->laboratory;
    }

    /**
     * Set verification
     *
     * @param \AppBundle\Entity\Verification $verification
     *
     * @return Etype
     */
    public function setVerification(\AppBundle\Entity\Verification $verification)
    {
        $this->verification = $verification;

        return $this;
    }

    /**
     * Get verification
     *
     * @return \AppBundle\Entity\Verification
     */
    public function getVerification()
    {
        return $this->verification;
    }

    /**
     * Set emodel
     *
     * @param \AppBundle\Entity\Efunction $emodel
     *
     * @return Etype
     */
    public function setEmodel(\AppBundle\Entity\Efunction $emodel)
    {
        $this->emodel = $emodel;

        return $this;
    }

    /**
     * Get emodel
     *
     * @return \AppBundle\Entity\Efunction
     */
    public function getEmodel()
    {
        return $this->emodel;
    }

    
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="etype_image", fileNameProperty="imageName", size="imageSize")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
        
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }
    
    /**
     * @param integer $imageSize
     *
     * @return Product
     */
    public function setImageSize($imageSize)
    {
        $this->imageSize = $imageSize;
        
        return $this;
    }

    /**
     * @return integer|null
     */
    public function getImageSize()
    {
        return $this->imageSize;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Etype
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
