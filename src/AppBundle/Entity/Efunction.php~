<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Efunction
 *
 * @ORM\Table(name="efunction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EfunctionRepository")
 */
class Efunction
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
     * @ORM\Column(name="funktion", type="string", length=50, unique=true)
     */
    private $funktion;

    /**
     * @var string
     *
     * @ORM\Column(name="fDesc", type="text", nullable=true)
     */
    private $fDesc;

    /**
     * One Etype has Many Functions.
     * @ORM\OneToMany(targetEntity="Etype", mappedBy="emodel")
     */
    private $etypes;

     public function __construct() {
        $this->etypes = new ArrayCollection();

    }

    public function __toString(){
        return $this->funktion;
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
     * Set funktion
     *
     * @param string $funktion
     *
     * @return Efunction
     */
    public function setFunktion($funktion)
    {
        $this->funktion = $funktion;

        return $this;
    }

    /**
     * Get funktion
     *
     * @return string
     */
    public function getFunktion()
    {
        return $this->funktion;
    }

    /**
     * Set fDesc
     *
     * @param string $fDesc
     *
     * @return Efunction
     */
    public function setFDesc($fDesc)
    {
        $this->fDesc = $fDesc;

        return $this;
    }

    /**
     * Get fDesc
     *
     * @return string
     */
    public function getFDesc()
    {
        return $this->fDesc;
    }

    /**
     * Add etype
     *
     * @param \AppBundle\Entity\Etype $etype
     *
     * @return Efunction
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
