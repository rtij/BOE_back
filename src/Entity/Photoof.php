<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photoof
 *
 * @ORM\Table(name="photoof", indexes={@ORM\Index(name="fk_offre_photoOf", columns={"idoffre"})})
 * @ORM\Entity
 */
class Photoof
{
    /**
     * @var int
     *
     * @ORM\Column(name="idphotoOf", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idphotoof;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idoffre", referencedColumnName="idoffre")
     * })
     */
    private $idoffre;

    public function getIdphotoof(): ?string
    {
        return $this->idphotoof;
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

    public function getIdoffre(): ?Offre
    {
        return $this->idoffre;
    }

    public function setIdoffre(?Offre $idoffre): self
    {
        $this->idoffre = $idoffre;

        return $this;
    }


}
