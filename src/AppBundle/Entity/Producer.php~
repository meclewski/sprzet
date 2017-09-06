<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Producer
 *
 * @ORM\Table(name="producer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProducerRepository")
 */
class Producer
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
     * @ORM\Column(name="pName", type="string", length=50, unique=true)
     */
    private $pName;

    /**
     * @var string
     *
     * @ORM\Column(name="pDesc", type="text", nullable=true)
     */
    private $pDesc;

    /**
     * One Etype has Many Producers.
     * @ORM\OneToMany(targetEntity="Etype", mappedBy="producer")
     */
    private $etypes;

     public function __construct() {
        $this->etypes = new ArrayCollection();

    }

    public function __toString(){
        return $this->pName;
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
     * Set pName
     *
     * @param string $pName
     *
     * @return Producer
     */
    public function setPName($pName)
    {
        $this->pName = $pName;

        return $this;
    }

    /**
     * Get pName
     *
     * @return string
     */
    public function getPName()
    {
        return $this->pName;
    }

    /**
     * Set pDesc
     *
     * @param string $pDesc
     *
     * @return Producer
     */
    public function setPDesc($pDesc)
    {
        $this->pDesc = $pDesc;

        return $this;
    }

    /**
     * Get pDesc
     *
     * @return string
     */
    public function getPDesc()
    {
        return $this->pDesc;
    }

    /**
     * Add etype
     *
     * @param \AppBundle\Entity\Etype $etype
     *
     * @return Producer
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
