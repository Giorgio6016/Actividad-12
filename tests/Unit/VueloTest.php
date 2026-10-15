<?php

use App\Models\Aeropuerto;
use App\Models\Vuelo;

test('se instancia un vuelo con su aeropuerto de origen y de destino', function () {
    $sjo = new Aeropuerto('SJO', 'Aeropuerto Internacional Juan Santamaría');
    $lir = new Aeropuerto('LIR', 'Aeropuerto Internacional Daniel Oduber Quirós');

    $vuelo = new Vuelo('CM-101', $sjo, $lir);

    expect($vuelo->numero())->toBe('CM-101')
        ->and($vuelo->origen())->toBe($sjo)
        ->and($vuelo->destino())->toBe($lir);
});

test('la asociación bidireccional queda sincronizada en ambos aeropuertos', function () {
    $sjo = new Aeropuerto('SJO', 'Aeropuerto Internacional Juan Santamaría');
    $lir = new Aeropuerto('LIR', 'Aeropuerto Internacional Daniel Oduber Quirós');

    $vuelo = new Vuelo('CM-101', $sjo, $lir);

    expect($sjo->salidas())->toContain($vuelo)
        ->and($lir->llegadas())->toContain($vuelo)
        ->and($sjo->llegadas())->toBeEmpty()
        ->and($lir->salidas())->toBeEmpty();
});

test('un aeropuerto puede tener varios vuelos de salida', function () {
    $sjo = new Aeropuerto('SJO', 'Aeropuerto Internacional Juan Santamaría');
    $lir = new Aeropuerto('LIR', 'Aeropuerto Internacional Daniel Oduber Quirós');
    $pty = new Aeropuerto('PTY', 'Aeropuerto Internacional de Tocumen');

    $v1 = new Vuelo('CM-101', $sjo, $lir);
    $v2 = new Vuelo('CM-202', $sjo, $pty);

    expect($sjo->salidas())->toHaveCount(2)
        ->and($sjo->salidas())->toBe([$v1, $v2]);
});

test('un vuelo no puede comenzar y terminar en el mismo aeropuerto', function () {
    $sjo = new Aeropuerto('SJO', 'Aeropuerto Internacional Juan Santamaría');

    new Vuelo('CM-999', $sjo, $sjo);
})->throws(InvalidArgumentException::class);
