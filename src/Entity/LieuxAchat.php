<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LieuxAchat
 *
 * @ORM\Table(name="lieux_achat", indexes={@ORM\Index(name="id_livre", columns={"id_livre"})})
 * @ORM\Entity
 */
class LieuxAchat
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
     * @var string|null
     *
     * @ORM\Column(name="vente_direct", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $venteDirect = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ecommerce", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $ecommerce = 'NULL';

    /**
     * @var \Livres
     *
     * @ORM\ManyToOne(targetEntity="Livres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_livre", referencedColumnName="id")
     * })
     */
    private $idLivre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVenteDirect(): ?string
    {
        return $this->venteDirect;
    }

    public function setVenteDirect(?string $venteDirect): self
    {
        $this->venteDirect = $venteDirect;

        return $this;
    }

    public function getEcommerce(): ?string
    {
        return $this->ecommerce;
    }

    public function setEcommerce(?string $ecommerce): self
    {
        $this->ecommerce = $ecommerce;

        return $this;
    }

    public function getIdLivre(): ?Livres
    {
        return $this->idLivre;
    }

    public function setIdLivre(?Livres $idLivre): self
    {
        $this->idLivre = $idLivre;

        return $this;
    }


}
