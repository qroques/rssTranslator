<?php

namespace App\Controller;

use App\Application\DeeplTranslator;
use App\Domain\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController {
    public function __construct(private readonly TranslatorInterface $translator) {}

    public function __invoke(Request $request)
    {
        dump($this->translator->trans('This is a test from Nantes by Quentin'));
    }
}
