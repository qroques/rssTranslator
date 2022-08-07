<?php

namespace App\Application;

use App\Domain\Model\RssCheck;
use App\Domain\Repository\RssChecksInterface;
use App\Domain\RssCheckerInterface;

class RssChecker implements RssCheckerInterface
{
    public function __construct(private readonly string $rssSourceUrl, private readonly RssChecksInterface $rssChecks)
    {
    }

    public function isRssBeenUptated(): bool
    {
        $currentRssState = file_get_contents($this->rssSourceUrl);
        if (!$currentRssState) {
            throw new \Exception(sprintf('An error occured while trying to fetch data from %s', $this->rssSourceUrl));
        }
        $hash = md5($currentRssState);

        $rssCheck = $this->rssChecks->findOneByHash($hash);

        if ($rssCheck instanceof RssCheck) {
            $rssCheck->check();
            $isNew = false;
        } else {
            $rssCheck = new RssCheck($hash);
            $isNew = true;
        }

        $this->rssChecks->add($rssCheck);

        return $isNew;
    }
}
