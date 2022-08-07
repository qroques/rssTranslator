<?php

namespace App\Application;

use App\Domain\Model\DeeplTranslation;
use App\Domain\Model\Translation;
use App\Domain\TranslatorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DeeplTranslator implements TranslatorInterface{
    public function __construct(
        private readonly string $apiKey,
        private readonly string $targetLanguage,
        private readonly string $domainUrl,
        private readonly HttpClientInterface $client
    ) {}

    public function trans(string $text): Translation
    {
        $response = $this->client->request(
            'POST',
            sprintf('https://%s/v2/translate', $this->domainUrl),
            [
                'headers' => [
                    'CAccept' => '*/*',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'body' => [
                    'auth_key' => $this->apiKey,
                    'target_lang' => $this->targetLanguage,
                    'text' => $text
                ],
            ]

        );


        return DeeplTranslation::fromDeeplResponse($this->targetLanguage, $text, $response);
    }
}
