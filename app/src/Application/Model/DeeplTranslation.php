<?php

namespace App\Domain\Model;

use InvalidArgumentException;
use Symfony\Contracts\HttpClient\ResponseInterface;

class DeeplTranslation implements Translation
{
    private function __construct(
        public readonly string $originalText,
        public readonly string $originalLocale,
        public readonly string $translatedText,
        public readonly string $translatedLocale,
    ) {
    }

    public static function fromDeeplResponse(string $translatedLocale, string $originalText, ResponseInterface $deeplResponse): self
    {
        if ($deeplResponse->getStatusCode() !== 200) {
            throw new InvalidArgumentException('Cannot build object Translation because response is not valid');
        }

        $arrayDeeplResponse = $deeplResponse->toArray();

        if (
            array_key_exists('translations', $arrayDeeplResponse)
            && array_key_exists(0, $arrayDeeplResponse['translations'])
            && array_key_exists('text', $arrayDeeplResponse['translations'][0])
        ) {
            return new self(
                $originalText,
                $arrayDeeplResponse['translations'][0]['detected_source_language'],
                $arrayDeeplResponse['translations'][0]['text'],
                $translatedLocale
            );
        } else {
            throw new InvalidArgumentException('Cannot build object Translation because response is not valid');
        }
    }

    public function __toString(): string
    {
        return $this->translatedText;
    }
}
