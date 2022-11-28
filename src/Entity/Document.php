<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 *
 * @ORM\Table(name="document", indexes={@ORM\Index(name="fk_utilisateur_document", columns={"idutilisateur"}), @ORM\Index(name="fk_typeD_document", columns={"idTypeD"})})
 * @ORM\Entity
 */
class Document
{
    /**
     * @var int
     *
     * @ORM\Column(name="idDocument", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddocument;

    /**
     * @var string
     *
     * @ORM\Column(name="Document", type="string", length=255, nullable=false)
     */
    private $document;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = '0';

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateur;

    /**
     * @var \Typed
     *
     * @ORM\ManyToOne(targetEntity="Typed")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTypeD", referencedColumnName="idTypeD")
     * })
     */
    private $idtyped;

    public function getIddocument(): ?string
    {
        return $this->iddocument;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function isIssup(): ?bool
    {
        return $this->issup;
    }

    public function setIssup(?bool $issup): self
    {
        $this->issup = $issup;

        return $this;
    }

    public function getIdutilisateur(): ?Utilisateur
    {
        return $this->idutilisateur;
    }

    public function setIdutilisateur(?Utilisateur $idutilisateur): self
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    public function getIdtyped(): ?Typed
    {
        return $this->idtyped;
    }

    public function setIdtyped(?Typed $idtyped): self
    {
        $this->idtyped = $idtyped;

        return $this;
    }


}
