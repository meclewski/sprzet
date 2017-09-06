<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaceRepository")
 */
class Place
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
     * @ORM\Column(name="plName", type="string", length=50, unique=true)
     */
    private $plName;

    /**
     * @var string
     *
     * @ORM\Column(name="plDesc", type="text", nullable=true)
     */
    private $plDesc;

    /**
     * One Place has Many Equipments.
     * @ORM\OneToMany(targetEntity="Equipment", mappedBy="place")
     */
    private $equipments;

     public function __construct() {
        $this->equipments = new ArrayCollection();

    }

    public function __toString(){
        return $this->plName;
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
     * Set plName
     *
     * @param string $plName
     *
     * @return Place
     */
    public function setPlName($plName)
    {
        $this->plName = $plName;

        return $this;
    }

    /**
     * Get plName
     *
     * @return string
     */
    public function getPlName()
    {
        return $this->plName;
    }

    /**
     * Set plDesc
     *
     * @param string $plDesc
     *
     * @return Place
     */
    public function setPlDesc($plDesc)
    {
        $this->plDesc = $plDesc;

        return $this;
    }

    /**
     * Get plDesc
     *
     * @return string
     */
    public function getPlDesc()
    {
        return $this->plDesc;
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
