<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vente
 *
 * @ORM\Table(name="vente", uniqueConstraints={@ORM\UniqueConstraint(name="nom", columns={"nom"})})
 * @ORM\Entity
 * @ORM\Entity (repositoryClass="App\Repository\VenteRepository")
 */
class Vente
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
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_vente", type="integer", nullable=false)
     */
    private $prixVente;

    /**
     * @var int
     *
     * @ORM\Column(name="nbre_vente", type="integer", nullable=false)
     */
    private $nbreVente;

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

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrixVente(): ?int
    {
        return $this->prixVente;
    }

    public function setPrixVente(int $prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function getNbreVente(): ?int
    {
        return $this->nbreVente;
    }

    public function setNbreVente(int $nbreVente): self
    {
        $this->nbreVente = $nbreVente;

        return $this;
    }


}
