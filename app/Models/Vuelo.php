<?php

namespace App\Models;

use InvalidArgumentException;

class Vuelo
{
    public function __construct(
        private string $numero,
        private Aeropuerto $origen,   
        private Aeropuerto $destino, 
    ) {
        if ($origen === $destino) {
            throw new InvalidArgumentException(
                'El aeropuerto de origen y el de destino deben ser distintos.'
            );
        }

        $origen->agregarSalida($this);
        $destino->agregarLlegada($this);
    }

    public function numero(): string
    {
        return $this->numero;
    }

    public function origen(): Aeropuerto
    {
        return $this->origen;
    }

    public function destino(): Aeropuerto
    {
        return $this->destino;
    }
}
