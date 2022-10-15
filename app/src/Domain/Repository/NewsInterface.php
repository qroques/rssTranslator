<?php

namespace App\Domain\Repository;

interface NewsInterface
{
    /** @return array<News> */
    public function findAllFrom(?string $id): array;
}
