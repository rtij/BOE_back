<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="fk_utilisateur_offre", columns={"idutilisateur"}), @ORM\Index(name="fk_typeo_offre", columns={"idtypeo"})})
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="idoffre", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateO", type="date", nullable=false)
     */
    private $dateo;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="validate", type="boolean", nullable=true)
     */
    private $validate = '0';

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
     * @var \Typeo
     *
     * @ORM\ManyToOne(targetEntity="Typeo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtypeo", referencedColumnName="idtypeo")
     * })
     */
    private $idtypeo;

    public function getIdoffre(): ?string
    {
        return $this->idoffre;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateo(): ?\DateTimeInterface
    {
        return $this->dateo;
    }

    public function setDateo(\DateTimeInterface $dateo): self
    {
        $this->dateo = $dateo;

        return $this;
    }

    public function isValidate(): ?bool
    {
        return $this->validate;
    }

    public function setValidate(?bool $validate): self
    {
        $this->validate = $validate;

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

    public function getIdtypeo(): ?Typeo
    {
        return $this->idtypeo;
    }

    public function setIdtypeo(?Typeo $idtypeo): self
    {
        $this->idtypeo = $idtypeo;

        return $this;
    }


}
