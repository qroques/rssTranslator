<?php

namespace App\Domain\Model;

class News
{
    public function __construct(
        private readonly \DateTimeImmutable $createdAt = new \DateTimeImmutable(),
        private readonly Locale $sourceLocale,
        private readonly Locale $targetLocale,
        private string $link,

        private string $originalTitle = '',
        private string $translatedTitle = '',
        private string $originalDesciption = '',
        private string $TranslatedDesciption = '',
    ) {
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getSourceLocale(): Locale
    {
        return $this->sourceLocale;
    }

    public function getTargetLocale(): Locale
    {
        return $this->targetLocale;
    }
}
