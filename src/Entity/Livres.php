<?php

namespace App\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livres
 *
 * @ORM\Table(name="livres", indexes={@ORM\Index(name="nom", columns={"nom"})})
 * @ORM\Entity
 * @ORM\Entity (repositoryClass="App\Repository\LivresRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(name="photo_ticket", type="string", length=255)
     */
    private $photoTicket;

    /**
     * @Vich\UploadableField(mapping="ticket_image", fileNameProperty="photoTicket")
     * @var File
     */
    private $ticketFile;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @Vich\UploadableField(mapping="photo_image", fileNameProperty="photo")
     * @var File
     */
    private $photoFile;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=80, nullable=false)
     */
    private $categorie;

    /**
     * @ORM\Column(type="datetime")
     *@var \DateTime
     */
        private $updatedAt;

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

    public function setPhotoTicket(?string $photoTicket): self
    {
        $this->photoTicket = $photoTicket;

        return $this;
    }
    public function setTicketFile(File $photoTicket = null)
    {
        $this->ticketFile = $photoTicket;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($photoTicket) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
          }
        }
        public function getTicketFile(): ?File
    {
        return $this->ticketFile;
    }
    public function setPhotoFile(File $photo = null)
    {
        $this->photoFile = $photo;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($photo) {
            // if 'updatedAt' is not defined in your entity, use another property
          $this->updatedAt = new \DateTime('now');
          }
        }
        public function getPhotoFile(): ?File
    {
        return $this->photoFile;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
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
