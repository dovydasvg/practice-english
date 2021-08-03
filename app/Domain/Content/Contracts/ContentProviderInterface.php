<?php


namespace App\Domain\Content\Contracts;


interface ContentProviderInterface
{
    public function getContent(): string;
}
