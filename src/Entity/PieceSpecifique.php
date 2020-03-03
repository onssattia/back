<?php

namespace App\Entity;
use App\Entity\PieceGenerale;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PieceSpecifiqueRepository")
 */
class PieceSpecifique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("post:read")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PieceGenerale", inversedBy="pieceSpecifiques")
     */
    private $PieceGenerale;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $Code;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups("post:read")
     */
    private $Designation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $Marque;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPieceGenerale(): ?PieceGenerale
    {
        return $this->PieceGenerale;
    }

    public function setPieceGenerale(?PieceGenerale $PieceGenerale): self
    {
        $this->PieceGenerale = $PieceGenerale;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(string $Code): self
    {
        $this->Code = $Code;

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

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }
}
