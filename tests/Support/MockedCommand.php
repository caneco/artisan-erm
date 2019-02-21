<?php

namespace Caneco\ArtisanErm\Tests\Support;

class MockedCommand
{
    public $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
