<?php

namespace App\Domain\Repository;

use App\Domain\Model\RssCheck;

interface RssChecksInterface
{
    public function findOneByHash(string $hash): ?RssCheck;

    public function add(RssCheck $rssCheck): void;
}
