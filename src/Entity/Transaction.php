<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $percentage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $firstRequirement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $secondRequirement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $thirdRequirement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $senderCountry;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $senderBank;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="transaction", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motif_80_pourcent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motif_90_pourcent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motif_50_pourcent;

    public function __toString(): string
    {
        return $this->sender;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPercentage(): ?int
    {
        return $this->percentage;
    }

    public function setPercentage(int $percentage): self
    {
        $this->percentage = $percentage;

        return $this;
    }

    public function getFirstRequirement(): ?string
    {
        return $this->firstRequirement;
    }

    public function setFirstRequirement(?string $firstRequirement): self
    {
        $this->firstRequirement = $firstRequirement;

        return $this;
    }

    public function getSecondRequirement(): ?string
    {
        return $this->secondRequirement;
    }

    public function setSecondRequirement(?string $secondRequirement): self
    {
        $this->secondRequirement = $secondRequirement;

        return $this;
    }

    public function getThirdRequirement(): ?string
    {
        return $this->thirdRequirement;
    }

    public function setThirdRequirement(?string $thirdRequirement): self
    {
        $this->thirdRequirement = $thirdRequirement;

        return $this;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getSenderCountry(): ?string
    {
        return $this->senderCountry;
    }

    public function setSenderCountry(string $senderCountry): self
    {
        $this->senderCountry = $senderCountry;

        return $this;
    }

    public function getSenderBank(): ?string
    {
        return $this->senderBank;
    }

    public function setSenderBank(?string $senderBank): self
    {
        $this->senderBank = $senderBank;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMotif80Pourcent(): ?string
    {
        return $this->motif_80_pourcent;
    }

    public function setMotif80Pourcent(?string $motif_80_pourcent): self
    {
        $this->motif_80_pourcent = $motif_80_pourcent;

        return $this;
    }

    public function getMotif90Pourcent(): ?string
    {
        return $this->motif_90_pourcent;
    }

    public function setMotif90Pourcent(?string $motif_90_pourcent): self
    {
        $this->motif_90_pourcent = $motif_90_pourcent;

        return $this;
    }

    public function getMotif50Pourcent(): ?string
    {
        return $this->motif_50_pourcent;
    }

    public function setMotif50Pourcent(?string $motif_50_pourcent): self
    {
        $this->motif_50_pourcent = $motif_50_pourcent;

        return $this;
    }
}
