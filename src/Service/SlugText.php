<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;

class SlugText 
{ 
    public function __construct(private SluggerInterface $slugger) {}

    public function makeSlug(string $text): string 
    { 
        return $this->slugger->slug($text)->lower();
    }
}