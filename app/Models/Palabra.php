<?php

namespace App\Models;

class Palabra
{
    private string $texto;

    public function __construct(string $texto)
    {
        $this->texto = $texto;
    }

    public function getTexto(): string
    {
        return $this->texto;
    }
}