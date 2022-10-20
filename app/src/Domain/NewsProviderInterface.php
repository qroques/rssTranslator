<?php

namespace App\Domain;

interface NewsProviderInterface
{
    /**
     * @return array<News>
     */
    public function getLatestNews(): array;
}
