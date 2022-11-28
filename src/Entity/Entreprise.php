<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;
/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise", indexes={@ORM\Index(name="fk_utilisateur_entreprise", columns={"idutilisateur"})})
 * @ORM\Entity
 */
class Entreprise
{
    /**
     * @var int
     *
     * @Groups("post:read")
     * @ORM\Column(name="identreprise", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identreprise;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="logo", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $logo = NULL;

    /**
     * @var bool|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = 0;

    /**
     * @var \Utilisateur
     *
     * @Groups("post:read")
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateur;

    public function getIdentreprise(): ?string
    {
        return $this->identreprise;
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

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


}
