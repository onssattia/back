<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PieceGeneraleRepository")
 */
class PieceGenerale
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("post:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $CodeInterne;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $Designation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PieceSpecifique", mappedBy="PieceGenerale")
     */
    private $pieceSpecifiques;

    public function __construct()
    {
        $this->pieceSpecifiques = new ArrayCollection();
    }

    

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

    /**
     * @return Collection|PieceSpecifique[]
     */
    public function getPieceSpecifiques(): Collection
    {
        return $this->pieceSpecifiques;
    }

    public function addPieceSpecifique(PieceSpecifique $pieceSpecifique): self
    {
        if (!$this->pieceSpecifiques->contains($pieceSpecifique)) {
            $this->pieceSpecifiques[] = $pieceSpecifique;
            $pieceSpecifique->setPieceGenerale($this);
        }

        return $this;
    }

    public function removePieceSpecifique(PieceSpecifique $pieceSpecifique): self
    {
        if ($this->pieceSpecifiques->contains($pieceSpecifique)) {
            $this->pieceSpecifiques->removeElement($pieceSpecifique);
            // set the owning side to null (unless already changed)
            if ($pieceSpecifique->getPieceGenerale() === $this) {
                $pieceSpecifique->setPieceGenerale(null);
            }
        }

        return $this;
    }

   
}
