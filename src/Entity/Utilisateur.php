<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur implements UserInterface
{
    /**
     * @var int
     *
     * @Groups("post:read")
     * @ORM\Column(name="idutilisateur", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = 0;

    /**
     * @var string
     *
     * @Groups("post:read")
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isonline", type="boolean", nullable=true)
     */
    private $isonline = 0;

     /**
     * @var bool|null
     *
     * @Groups("post:read")
     * @ORM\Column(name="isetudiant", type="boolean", nullable=true)
     */
    private $isetudiant = 0;

    public function getIdutilisateur(): ?string
    {
        return $this->idutilisateur;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function isIsonline(): ?bool
    {
        return $this->isonline;
    }

    public function setIsonline(?bool $isonline): self
    {
        $this->isonline = $isonline;

        return $this;
    }

    public function getIsetudiant():?bool{
        return $this->isetudiant;
    }
    public function setIsetudiant(bool $isetudiant){
        $this->isetudiant = $isetudiant;
        return $this;
    }

    public function getRoles()
    {
        return [];
    }
    public function getUserIdentifier()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
        
    }
    public function getSalt()
    {
        return null;
    }
}
