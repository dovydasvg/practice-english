<?php


namespace App\Domain\Content\Contracts;


interface ContentProviderInterface
{
    public function getRandomContent(): string;
}
