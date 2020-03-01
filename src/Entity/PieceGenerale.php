<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PieceGeneraleRepository")
 */
class PieceGenerale
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CodeInterne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Designation;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeInterne(): ?string
    {
        return $this->CodeInterne;
    }

    public function setCodeInterne(string $CodeInterne): self
    {
        $this->CodeInterne = $CodeInterne;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->Designation;
    }

    public function setDesignation(string $Designation): self
    {
        $this->Designation = $Designation;

        return $this;
    }

   
}
