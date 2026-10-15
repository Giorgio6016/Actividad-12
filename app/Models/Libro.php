<?php

namespace App\Models;

class Libro
{
    private string $titulo;
    private array $capitulos = [];

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function agregarCapitulo(Capitulo $capitulo): void
    {
        $this->capitulos[] = $capitulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getCapitulos(): array
    {
        return $this->capitulos;
    }
}