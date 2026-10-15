<?php

namespace App\Models;

class Oracion
{
    private string $texto;
    private array $palabras = [];

    public function __construct(string $texto)
    {
        $this->texto = $texto;
    }

    public function agregarPalabra(Palabra $palabra): void
    {
        $this->palabras[] = $palabra;
    }

    public function getTexto(): string
    {
        return $this->texto;
    }

    public function getPalabras(): array
    {
        return $this->palabras;
    }
}