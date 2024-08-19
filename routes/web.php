<?php

use App\Http\Controllers\VentasAppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(\route('ventasapp.index'));
});

Route::get('/ventasapp', [VentasAppController::class, 'index'])->name('ventasapp.index');
Route::post('/ventasapp/buscar', [VentasAppController::class, 'buscar'])->name('ventasapp.buscar');
Route::get('/ventasapp/buscar', [VentasAppController::class, 'buscar'])->name('ventasapp.buscar');
Route::get('/ventasapp/confirmar_eliminacion/{id}', [VentasAppController::class, 'confirmarEliminacion'])->name('ventasapp.confirmar_eliminacion');
Route::delete('/ventasapp/eliminar/{id}', [VentasAppController::class, 'eliminar'])->name('ventasapp.eliminar');
Route::get('/ventasapp/exportar', [VentasAppController::class, 'exportarTransaccionesEliminadas'])->name('ventasapp.exportar');
Route::get('/test_conexion', [VentasAppController::class, 'testConexion'])->name('ventasapp.test_conexion');
Route::post('/restaurantes-por-cadena', [VentasAppController::class, 'obtenerRestaurantesPorCadena'])->name('restaurantes.cadena');

require __DIR__.'/auth.php';
