<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photosp
 *
 * @ORM\Table(name="photosp", indexes={@ORM\Index(name="fk_photop_poste", columns={"idposte"})})
 * @ORM\Entity
 */
class Photosp
{
    /**
     * @var int
     *
     * @ORM\Column(name="idphotop", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idphotop;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    /**
     * @var \Poste
     *
     * @ORM\ManyToOne(targetEntity="Poste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idposte", referencedColumnName="idposte")
     * })
     */
    private $idposte;

    public function getIdphotop(): ?string
    {
        return $this->idphotop;
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

    public function getIdposte(): ?Poste
    {
        return $this->idposte;
    }

    public function setIdposte(?Poste $idposte): self
    {
        $this->idposte = $idposte;

        return $this;
    }


}
