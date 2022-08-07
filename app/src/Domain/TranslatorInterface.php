<?php

namespace App\Domain;

use App\Domain\Model\Translation;

interface TranslatorInterface {
    public function trans(string $text): Translation;
}
