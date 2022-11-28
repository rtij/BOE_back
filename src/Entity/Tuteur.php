<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Tuteur
 *
 * @ORM\Table(name="tuteur", indexes={@ORM\Index(name="fk_entreprise_tuteur", columns={"identreprise"}), @ORM\Index(name="fk_tuteur_utilisateur", columns={"idutilisateur"})})
 * @ORM\Entity
 */
class Tuteur
{
    /**
     * @var int
     *
     * @Groups("post:read")
     * @ORM\Column(name="idtuteur", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtuteur;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

     /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="contact", type="string", length=255, nullable=false)
     */
    private $contact;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="poste", type="string", length=255, nullable=false)
     */
    private $poste;

    /**
     * @var string|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="entreprise", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $entreprise = NULL;

     /**
     * @var string|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="photo", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $photo = NULL;

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

    /**
     * @var \Entreprise
     *
     * @Groups("post:read")
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identreprise", referencedColumnName="identreprise")
     * })
     */
    private $identreprise;

    public function getIdtuteur(): ?string
    {
        return $this->idtuteur;
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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $nom): self
    {
        $this->email = $nom;

        return $this;
    }


    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $nom): self
    {
        $this->prenom = $nom;

        return $this;
    }
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(?string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self{
        $this->photo = $photo;
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

    public function getIdentreprise(): ?Entreprise
    {
        return $this->identreprise;
    }

    public function setIdentreprise(?Entreprise $identreprise): self
    {
        $this->identreprise = $identreprise;

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
}
