<?php

namespace App\Domain\Model;

class News
{
    public readonly \DateTimeImmutable $createdAt;

    public function __construct(
        private int $providerId,
        private int $providerRecordId,
        private \DateTimeImmutable $writedAt,
        private Translation $title,
        private ?Translation $subtitle,
        private ?Translation $body,
        private bool $alert,
    ) {
        $this->createdAt = new \DateTimeImmutable();
    }
}
