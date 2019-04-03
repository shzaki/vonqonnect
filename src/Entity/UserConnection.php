<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserConnectionRepository")
 */
class UserConnection
{
	CONST PENDING = 0;
	CONST CONNECTED = 1;
	CONST DECLINED = 2;

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
    private $connection;

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

    public function getConnection(): ?User
    {
        return $this->connection;
    }

    public function setConnection(?User $connection): self
    {
        $this->connection = $connection;

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
