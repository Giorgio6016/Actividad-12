<?php

namespace App\Models;

class Parrafo
{
    private string $texto;
    private array $oraciones = [];

    public function __construct(string $texto)
    {
        $this->texto = $texto;
    }

    public function agregarOracion(string $texto): Oracion
    {
        $oracion = new Oracion($texto);
        $this->oraciones[] = $oracion;

        return $oracion;
    }

    public function getTexto(): string
    {
        return $this->texto;
    }

    public function getOraciones(): array
    {
        return $this->oraciones;
    }
}