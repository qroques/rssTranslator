<?php

namespace App\Domain;

interface RssCheckerInterface
{
    public function isRssBeenUptated(): bool;
}
