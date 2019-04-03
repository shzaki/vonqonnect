<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserConnectionRepository")
 */
class UserConnection
{
    /**
	 * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
	 * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userConnections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $connectionId;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getConnectionId(): ?User
    {
        return $this->connectionId;
    }

    public function setConnectionId(?User $connectionId): self
    {
        $this->connectionId = $connectionId;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }
}
