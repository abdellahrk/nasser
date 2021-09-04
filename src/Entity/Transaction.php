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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
