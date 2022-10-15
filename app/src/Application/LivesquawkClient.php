<?php

namespace App\Application;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class LivesquawkClient
{
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly string $livesquawkUrl,
        private readonly string $livesquawkAuthKey

    ) {
    }

    /**
     * @param integer|null $id
     * @return array<string, string>
     */
    public function getAllFrom(?int $id = null): array
    {
        $response = $this->client->request(
            'GET',
            sprintf(
                '%s&from=%d',
                $this->getProviderUrl(),
                $id
            )
        );

        return $response->toArray();
    }

    private function getProviderUrl(): string
    {
        return sprintf(
            '%s?auth_key=%s',
            $this->livesquawkUrl,
            $this->livesquawkAuthKey
        );
    }
}
