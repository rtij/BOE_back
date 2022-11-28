<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alternant
 *
 * @ORM\Table(name="alternant", indexes={@ORM\Index(name="fk_tuteur_alternant", columns={"idtuteur"}), @ORM\Index(name="fk_alternant_diplome", columns={"iddiplome"}), @ORM\Index(name="fk_utilisateur_alternant", columns={"idutilisateur"})})
 * @ORM\Entity
 */
class Alternant
{
    /**
     * @var int
     *
     * @ORM\Column(name="idalaternant", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idalaternant;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=false)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="anneeu", type="string", length=255, nullable=false)
     */
    private $anneeu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="anneeSortie", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $anneesortie = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255, nullable=false)
     */
    private $poste;

    /**
     * @var \Tuteur
     *
     * @ORM\ManyToOne(targetEntity="Tuteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtuteur", referencedColumnName="idtuteur")
     * })
     */
    private $idtuteur;

    /**
     * @var \Diplome
     *
     * @ORM\ManyToOne(targetEntity="Diplome")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddiplome", referencedColumnName="iddiplome")
     * })
     */
    private $iddiplome;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idutilisateur", referencedColumnName="idutilisateur")
     * })
     */
    private $idutilisateur;

    public function getIdalaternant(): ?string
    {
        return $this->idalaternant;
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

    public function getAnneeu(): ?string
    {
        return $this->anneeu;
    }

    public function setAnneeu(string $anneeu): self
    {
        $this->anneeu = $anneeu;

        return $this;
    }

    public function getAnneesortie(): ?string
    {
        return $this->anneesortie;
    }

    public function setAnneesortie(?string $anneesortie): self
    {
        $this->anneesortie = $anneesortie;

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

    public function getIdtuteur(): ?Tuteur
    {
        return $this->idtuteur;
    }

    public function setIdtuteur(?Tuteur $idtuteur): self
    {
        $this->idtuteur = $idtuteur;

        return $this;
    }

    public function getIddiplome(): ?Diplome
    {
        return $this->iddiplome;
    }

    public function setIddiplome(?Diplome $iddiplome): self
    {
        $this->iddiplome = $iddiplome;

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
