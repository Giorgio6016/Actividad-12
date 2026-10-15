<?php

namespace App\Models;

class Aeropuerto
{
    private array $salidas = [];

    private array $llegadas = [];

    public function __construct(
        private string $codigo,
        private string $nombre,
    ) {}

    public function codigo(): string
    {
        return $this->codigo;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }

    public function salidas(): array
    {
        return $this->salidas;
    }

    public function llegadas(): array
    {
        return $this->llegadas;
    }
    
    public function agregarSalida(Vuelo $vuelo): void
    {
        $this->salidas[] = $vuelo;
    }

    public function agregarLlegada(Vuelo $vuelo): void
    {
        $this->llegadas[] = $vuelo;
    }
}
