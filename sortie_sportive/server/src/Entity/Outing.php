<?php

namespace App\Entity;

use App\Repository\OutingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OutingRepository::class)
 */
class Outing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $start_at;

    /**
     * @ORM\Column(type="string")
     */
    private $end_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $distance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    // /**
    //  * @ORM\Column(type="integer")
    //  */
    // private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $start_time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $end_time;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="outings")
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStartAt(): ?string
    {
        return $this->start_at;
    }

    public function setStartAt( ?string $start_at): self
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getLastAt(): ?string
    {
        return $this->end_at;
    }

    public function setLastAt( ?string $end_at): self
    {
        $this->end_at = $end_at;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    // public function getUser(): ?int
    // {
    //     return $this->user;
    // }

    // public function setUser(int $user): self
    // {
    //     $this->user = $user;

    //     return $this;
    // }

    public function getStartTime(): ?string
    {
        return $this->start_time;
    }

    public function setStartTime(string $start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndTime(): ?string
    {
        return $this->end_time;
    }

    public function setEndTime(string $end_time): self
    {
        $this->end_time = $end_time;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
