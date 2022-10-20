<?php

namespace App\Controller;

use App\Application\LivesquawkClient;
use App\Domain\NewsProviderInterface;
use App\Domain\Repository\RssChecksInterface;
use App\Domain\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function __construct(
        private readonly TranslatorInterface $translator,
        private readonly string $rssSourceUrl,
        private readonly RssChecksInterface $rssChecks,
        private readonly LivesquawkClient $client,
        private readonly NewsProviderInterface $newsProvider,
        )
    {
    }

    public function __invoke(): Response
    {
        //$records = $this->client->getAllFrom()['data'];
        dump($this->newsProvider->getLatestNews());
        // foreach($records as $record) {
        //     dump($this->translator->trans($record['title']));
        //     return new JsonResponse();
        // }

        // dump($this->client->getAllFrom());


        // dump(simplexml_load_string(file_get_contents($this->rssSourceUrl)));
        // $currentRssState = file_get_contents($this->rssSourceUrl);
        // $hash = md5($currentRssState);

        // $rssCheck = $this->rssChecks->findOneByHash($hash);

        // if ($rssCheck instanceof RssCheck) {
        //     $rssCheck->check();
        // } else {
        //     $rssCheck = new RssCheck($hash);
        // }
        // $this->rssChecks->add($rssCheck);

        // dump($rssCheck);

        // $response = new Response(simplexml_load_string(file_get_contents($this->rssSourceUrl)));
        // $response->headers->set('Content-Type', 'text/xml');
        // return $response;
return new JsonResponse();
        return new JsonResponse(['text' => $this->translator->trans('<b>FeedForAll </b>helps Restaurant\'s communicate with customers. Let your customers know the latest specials or events.<br>


        <br>


        RSS feed uses include:<br>')]);
    }
}
