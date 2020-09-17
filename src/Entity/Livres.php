<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livres
 *
 * @ORM\Table(name="livres", indexes={@ORM\Index(name="nom", columns={"nom"})})
 * @ORM\Entity
 * @ORM\Entity (repositoryClass="App\Repository\LivresRepository")
 */
class Livres
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=25, nullable=false)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_achat", type="date", nullable=false)
     */
    private $dateAchat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_garantie", type="date", nullable=false)
     */
    private $dateGarantie;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="conseil", type="text", length=65535, nullable=false)
     */
    private $conseil;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_ticket", type="string", length=255, nullable=false)
     */
    private $photoTicket;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=80, nullable=false)
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getDateGarantie(): ?\DateTimeInterface
    {
        return $this->dateGarantie;
    }

    public function setDateGarantie(\DateTimeInterface $dateGarantie): self
    {
        $this->dateGarantie = $dateGarantie;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getConseil(): ?string
    {
        return $this->conseil;
    }

    public function setConseil(string $conseil): self
    {
        $this->conseil = $conseil;

        return $this;
    }

    public function getPhotoTicket(): ?string
    {
        return $this->photoTicket;
    }

    public function setPhotoTicket(string $photoTicket): self
    {
        $this->photoTicket = $photoTicket;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


}
