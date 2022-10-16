<?php

namespace App\Application;

use App\Domain\Model\News;
use App\Domain\NewsProviderInterface;
use App\Domain\TranslatorInterface;

class LivesquawkNewsProvider implements NewsProviderInterface
{
    public function __construct(
        private readonly TranslatorInterface $translator,
        private readonly LivesquawkClient $client
    ) {
    }

    public function getLatestNews(): array
    {
        $records = $this->client->getAllFrom()['data'];
        $newsArray = [];

        foreach($records as $record) {
            try{
                $news = new News(
                    $record['ID'],
                    $record['record_id'],
                    (new \DateTimeImmutable())->setTimeStamp($record['date_write']),
                    $this->translator->trans($record['title']),
                    $record['subtitle'] ? $this->translator->trans($record['subtitle']) : null,
                    $record['body'] ? $this->translator->trans($record['body']) : null,
                    (bool) $record['alert']
                );

                $newsArray[] = $news;
            } catch(\Throwable $e) {
                continue;
            }
        }

        return $newsArray;
    }
}
