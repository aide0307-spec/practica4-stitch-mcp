<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'dashboard')->name('dashboard');

// ===== Práctica 4: pantallas convertidas desde Google Stitch =====

// Listar usuarios (pantalla de Stitch "Suscriptores – Directorio General")
Route::view('/suscriptores', 'suscriptores')->name('suscriptores');

// Editar perfil (pantalla de Stitch "Gestión Integral de Colaborador")
Route::view('/perfil', 'perfil')->name('perfil');

// Registro de usuario (pantalla de Stitch "Alta de planta – Paso 3: Elige tu Plan")
Route::view('/registro', 'registro')->name('registro');

Route::post('/registro', function (Request $request) {
    $datos = $request->validate([
        'plan' => ['required', 'in:emprendedor,pro,corp'],
        'periodo' => ['required', 'in:mensual,anual'],
    ], [
        'plan.required' => 'Elige un plan para continuar.',
        'plan.in' => 'El plan seleccionado no es válido.',
    ]);

    $nombres = ['emprendedor' => 'Emprendedor', 'pro' => 'Expansión Pro', 'corp' => 'Corporativo'];

    return redirect()
        ->route('registro')
        ->withInput()
        ->with('status', "Plan {$nombres[$datos['plan']]} ({$datos['periodo']}) guardado. Continúa al paso 4 de pago.");
})->name('registro.store');
