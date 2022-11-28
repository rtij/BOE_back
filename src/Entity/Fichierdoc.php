<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichierdoc
 *
 * @ORM\Table(name="fichierdoc", indexes={@ORM\Index(name="fk_document_fichierDoc", columns={"idDocument"})})
 * @ORM\Entity
 */
class Fichierdoc
{
    /**
     * @var int
     *
     * @ORM\Column(name="idfichierDoc", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfichierdoc;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=255, nullable=false)
     */
    private $fichier;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = '0';

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDocument", referencedColumnName="idDocument")
     * })
     */
    private $iddocument;

    public function getIdfichierdoc(): ?string
    {
        return $this->idfichierdoc;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

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

    public function getIddocument(): ?Document
    {
        return $this->iddocument;
    }

    public function setIddocument(?Document $iddocument): self
    {
        $this->iddocument = $iddocument;

        return $this;
    }


}
