<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeo
 *
 * @ORM\Table(name="typeo")
 * @ORM\Entity
 */
class Typeo
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtypeo", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeo;

    /**
     * @var string
     *
     * @ORM\Column(name="typeo", type="string", length=255, nullable=false)
     */
    private $typeo;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="issup", type="boolean", nullable=true)
     */
    private $issup = '0';

    public function getIdtypeo(): ?string
    {
        return $this->idtypeo;
    }

    public function getTypeo(): ?string
    {
        return $this->typeo;
    }

    public function setTypeo(string $typeo): self
    {
        $this->typeo = $typeo;

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
