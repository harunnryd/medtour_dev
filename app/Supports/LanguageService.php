<?php

namespace App\Supports;

use App\Repositories\LanguageRepository;
use App\Http\Requests\LanguageRequest;

class LanguageService {

    private $language;

    public function __construct(LanguageRepository $language)
    {
        $this->language = $language;
    }

    public function languageRepository()
    {
        return $this->language;
    }

    public function pluck($field, $id = 'slug') {
        return $this->languageRepository()
                    ->makeModel()
                    ->pluck($field, $id);
    }
}