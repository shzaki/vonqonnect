<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserConnectionsRepository")
 */
class UserConnections
{
    /**
	 * @ORM\Id()
     * @ORM\Column(type="integer")
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="id")
     */
    private $userId;

    /**
	 * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $userConnectionId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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

    public function getUserConnectionId(): ?int
    {
        return $this->userConnectionId;
    }

    public function setUserConnectionId(int $userConnectionId): self
    {
        $this->userConnectionId = $userConnectionId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
