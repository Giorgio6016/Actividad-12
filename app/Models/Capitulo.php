<?php

namespace App\Models;

class Capitulo
{
    private string $titulo;
    private array $parrafos = [];

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function agregarParrafo(string $texto): Parrafo
    {
        $parrafo = new Parrafo($texto);
        $this->parrafos[] = $parrafo;

        return $parrafo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getParrafos(): array
    {
        return $this->parrafos;
    }
}