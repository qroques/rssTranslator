<?php

namespace App\Domain\Model;

use Ramsey\Uuid\Uuid;

class RssCheck
{
    private readonly string $id;
    private readonly \DateTimeImmutable $createdAt;
    private \DateTimeImmutable $lastCheckedAt;

    public function __construct(
        private readonly string $hash,
    ) {
        $this->createdAt = new \DateTimeImmutable();
        $this->lastCheckedAt = new \DateTimeImmutable();
        $this->id = Uuid::uuid4();
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getLastCheckedAt(): \DateTimeImmutable
    {
        return $this->lastCheckedAt;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function check(): void
    {
        $this->lastCheckedAt = new \DateTimeImmutable();
    }

    public function getId(): string
    {
        return $this->id;
    }
}
