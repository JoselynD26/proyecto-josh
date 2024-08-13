<?php

namespace App\Http\Controllers;

use App\Models\ST_Transaccional;
use Illuminate\Http\Request;
use App\Models\VentasApp;
use App\Models\Cadena;
use App\Models\Restaurante;
use App\Models\Auditoria;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaccionesEliminadasExport;
use Illuminate\Support\Facades\DB;

class VentasAppController extends Controller
{
    // se definen y se inicializan estas propiedades, que se conectan con los modelos.
    public Cadena $cadenas;
    public Restaurante $restaurantes;
    public VentasApp $ventasapp;
    public ST_Transaccional $transacciones;

    public function __construct(Cadena $cadenas, Restaurante $restaurantes, VentasApp $ventasApp, ST_Transaccional $transacciones)
    {
        $this->cadenas = $cadenas;
        $this->restaurantes = $restaurantes;
        $this->ventasapp = $ventasApp;
        $this->transacciones = $transacciones;
    }

    public function index()
    {
        //obtiene todas las cadenas, restaurantes y ventas de la base de datos
        $cadenas = $this->cadenas->all();
        $restaurantes = $this->restaurantes->all();
        $ventasapp = $this->ventasapp->all();

        //pasar datos a la vista
        return view('ventasapp.index', compact('cadenas', 'restaurantes', 'ventasapp'));
    }

    public function buscar(Request $request)
    {
        $resultados = [];
        $request->validate([
            'cadena' => 'required|exists:cadena,Cod_Cadena',
            'fecha' => 'nullable|date',
            'restaurante' => 'required|exists:restaurante,cod_restaurante',
            'codigoApp' => 'nullable|string',
            'valor' => 'nullable|numeric'
        ]);

        if ($request->cadena && $request->restaurante && $request->codigoApp) {
            $resultados = $this->ventasapp
                ->where('CodTienda', $request->restaurante)
                ->where('IdTransaccion', $request->codigoApp)->get();
            $cadena = $this->cadenas->find($request->cadena);
            $restaurante = $this->restaurantes->find($request->restaurante);
        }

        return view('ventasapp.resultados', compact('resultados', 'cadena', 'restaurante'));
    }
 //actualiza la lista de restaurantes por cadena del formato json
    public function obtenerRestaurantesPorCadena(Request $request)
    {
        $restaurantes = $this->restaurantes->where('Cod_Cadena', $request->Cod_Cadena)->get();
        return response()->json($restaurantes);
    }

    public function confirmarEliminacion($id)
    {
        $transaccion = VentasApp::findOrFail($id);
        return view('ventasapp.confirmar_eliminar', compact('transaccion'));
    }

    public function eliminar($id)
    {
        $transaccion = $this->ventasapp->where('IdTransaccion', $id)->get();
        // Guardar en tabla de auditoría
        Auditoria::create([
            'accion' => 'Eliminación',
            'descripcion' => 'Se eliminó la transacción con ID ' . $transaccion[0]->IdTransaccion,
            'datos' => json_encode($transaccion[0]->toArray())
        ]);

        // Eliminar la transacción
//        $transaccion->delete();

        return 'ok';
    }

    public function exportarTransaccionesEliminadas()
    {
        return Excel::download(new TransaccionesEliminadasExport, 'transacciones_eliminadas.xlsx');
    }

    public function testConexion()
    {
        try {
            DB::connection()->getPdo();
            return "Conexión exitosa a la base de datos " . DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            return "No se pudo conectar a la base de datos. Error: " . $e->getMessage();
        }
    }
}
