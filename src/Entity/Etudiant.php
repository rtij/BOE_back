<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant", indexes={@ORM\Index(name="fk_diplome_etudiant", columns={"iddiplome"}), @ORM\Index(name="fk_utilisateur_etudiant", columns={"idutilisateur"})})
 * @ORM\Entity
 */
class Etudiant
{
    /**
     * @var int
     *
     * @ORM\Column(name="idetudiant", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idetudiant;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable=false)
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
     * @ORM\Column(name="email", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $email = 'NULL';

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
     * @var \Diplome
     *
     * @ORM\ManyToOne(targetEntity="Diplome")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddiplome", referencedColumnName="iddiplome")
     * })
     */
    private $iddiplome;

    public function getIdetudiant(): ?string
    {
        return $this->idetudiant;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getIddiplome(): ?Diplome
    {
        return $this->iddiplome;
    }

    public function setIddiplome(?Diplome $iddiplome): self
    {
        $this->iddiplome = $iddiplome;

        return $this;
    }


}
