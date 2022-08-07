<?php

namespace App\Doctrine\Repository;

use App\Domain\Model\RssCheck;
use App\Domain\Repository\RssChecksInterface;
use Doctrine\ORM\EntityManagerInterface;

class RssChecks implements RssChecksInterface
{
    /**
     * @var \Doctrine\ORM\EntityRepository<RssCheck>
     */
    private \Doctrine\ORM\EntityRepository $innerRepository;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        $this->innerRepository = $this->entityManager->getRepository(RssCheck::class);
    }

    public function findOneByHash(string $hash): ?RssCheck
    {
        return $this->innerRepository->findOneBy([
            'hash' => $hash,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function add(RssCheck $rssCheck): void
    {
        $this->entityManager->persist($rssCheck);
        $this->entityManager->flush();
    }
}
