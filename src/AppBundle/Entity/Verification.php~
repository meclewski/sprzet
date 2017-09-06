<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Verification
 *
 * @ORM\Table(name="verification")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VerificationRepository")
 */
class Verification
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
     * @ORM\Column(name="vKind", type="string", length=50, unique=true)
     */
    private $vKind;

    /**
     * @var string
     *
     * @ORM\Column(name="vDesc", type="text", nullable=true)
     */
    private $vDesc;

    /**
     * One Etype has Many Verifications.
     * @ORM\OneToMany(targetEntity="Etype", mappedBy="verification")
     */
    private $etypes;

     public function __construct() {
        $this->etypes = new ArrayCollection();

    }

    public function __toString(){
        return $this->vKind;
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
     * Set vKind
     *
     * @param string $vKind
     *
     * @return Verification
     */
    public function setVKind($vKind)
    {
        $this->vKind = $vKind;

        return $this;
    }

    /**
     * Get vKind
     *
     * @return string
     */
    public function getVKind()
    {
        return $this->vKind;
    }

    /**
     * Set vDesc
     *
     * @param string $vDesc
     *
     * @return Verification
     */
    public function setVDesc($vDesc)
    {
        $this->vDesc = $vDesc;

        return $this;
    }

    /**
     * Get vDesc
     *
     * @return string
     */
    public function getVDesc()
    {
        return $this->vDesc;
    }

    /**
     * Add etype
     *
     * @param \AppBundle\Entity\Etype $etype
     *
     * @return Verification
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
