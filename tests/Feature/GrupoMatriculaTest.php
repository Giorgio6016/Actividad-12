<?php

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Grupo;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('un grupo puede tener dos estudiantes matriculados', function () {
    $curso = Curso::create(['codigo' => 'IF-6100', 'nombre' => 'Análisis y Diseño de Sistemas']);
    $docente = Docente::create(['nombre' => 'Profe Prueba']);

    $grupo = Grupo::create([
        'numero' => 1,
        'cupo' => 30,
        'curso_id' => $curso->id,
        'docente_id' => $docente->id,
    ]);

    $ana = Estudiante::create(['carnet' => 'A00001', 'nombre' => 'Ana']);
    $luis = Estudiante::create(['carnet' => 'A00002', 'nombre' => 'Luis']);

    $grupo->estudiantes()->attach($ana->id, ['fecha' => '2026-10-14']);
    $grupo->estudiantes()->attach($luis->id, ['fecha' => '2026-10-14']);

    expect($grupo->estudiantes)->toHaveCount(2);
    expect($grupo->curso->codigo)->toBe('IF-6100');
    $this->assertDatabaseCount('matriculas', 2);
});
