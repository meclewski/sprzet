<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Laboratory
 *
 * @ORM\Table(name="laboratory")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LaboratoryRepository")
 */
class Laboratory
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
     * @ORM\Column(name="lName", type="string", length=100, unique=true)
     */
    private $lName;

    /**
     * @var bool
     *
     * @ORM\Column(name="accreditation", type="boolean")
     */
    private $accreditation;

    /**
     * @var string
     *
     * @ORM\Column(name="lDesc", type="text", nullable=true)
     */
    private $lDesc;

    /**
     * One Etype has Many Laboratries.
     * @ORM\OneToMany(targetEntity="Etype", mappedBy="laboratory")
     */
    private $etypes;

     public function __construct() {
        $this->etypes = new ArrayCollection();

    }

    public function __toString(){
        return $this->lName;
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
     * Set lName
     *
     * @param string $lName
     *
     * @return Laboratory
     */
    public function setLName($lName)
    {
        $this->lName = $lName;

        return $this;
    }

    /**
     * Get lName
     *
     * @return string
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * Set accreditation
     *
     * @param boolean $accreditation
     *
     * @return Laboratory
     */
    public function setAccreditation($accreditation)
    {
        $this->accreditation = $accreditation;

        return $this;
    }

    /**
     * Get accreditation
     *
     * @return bool
     */
    public function getAccreditation()
    {
        return $this->accreditation;
    }

    /**
     * Set lDesc
     *
     * @param string $lDesc
     *
     * @return Laboratory
     */
    public function setLDesc($lDesc)
    {
        $this->lDesc = $lDesc;

        return $this;
    }

    /**
     * Get lDesc
     *
     * @return string
     */
    public function getLDesc()
    {
        return $this->lDesc;
    }

    /**
     * Add etype
     *
     * @param \AppBundle\Entity\Etype $etype
     *
     * @return Laboratory
     */
    public function addEtype(\AppBundle\Entity\Etype $etype)
    {
        $this->etypes[] = $etype;

        return $this;
    }

    /**
     * Remove etype
     *
     * @param \AppBundle\Entity\Etype $etype
     */
    public function removeEtype(\AppBundle\Entity\Etype $etype)
    {
        $this->etypes->removeElement($etype);
    }

    /**
     * Get etypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtypes()
    {
        return $this->etypes;
    }
}
