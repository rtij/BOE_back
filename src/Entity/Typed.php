<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typed
 *
 * @ORM\Table(name="typed")
 * @ORM\Entity
 */
class Typed
{
    /**
     * @var int
     *
     * @ORM\Column(name="idTypeD", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtyped;

    /**
     * @var string
     *
     * @ORM\Column(name="TypeD", type="string", length=255, nullable=false)
     */
    private $typed;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = '0';

    public function getIdtyped(): ?int
    {
        return $this->idtyped;
    }

    public function getTyped(): ?string
    {
        return $this->typed;
    }

    public function setTyped(string $typed): self
    {
        $this->typed = $typed;

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
