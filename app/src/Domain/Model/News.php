<?php

namespace App\Domain\Model;

class News
{
    private readonly \DateTimeImmutable $createdAt;

    public function __construct(
        private readonly Locale $sourceLocale,
        private readonly Locale $targetLocale,
        private string $link,
        private string $originalTitle = '',
        private string $translatedTitle = '',
        private string $originalDesciption = '',
        private string $TranslatedDesciption = '',
    ) {
        $this->createdAt = new \DateTimeImmutable();
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

    public function getLink(): string
    {
        return $this->link;
    }

    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    public function getOriginalDescription(): string
    {
        return $this->originalDesciption;
    }

    public function getTranslatedTitle(): string
    {
        return $this->translatedTitle;
    }

    public function getTranslatedDescription(): string
    {
        return $this->TranslatedDesciption;
    }


}
