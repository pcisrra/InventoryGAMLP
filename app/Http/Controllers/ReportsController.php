<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Excel;

class ReportsController extends Controller{
    function index(){
        $materials_data = DB::table('materials')->get();
        return view('export_excel')->with('materials_data', $materials_data);
    }

    function generateMat(){
        $materials_data = DB::table('materials')->get()->toArray();
        $materials_array[] = array('Código', 'Descripción', 'Fecha de ingreso','Fecha de última salida',
        'Cantidad (en unidades)','Unidad de almacenaje', 'Costo Unitario (en Bs.)', 'Costo Total (en Bs.)');
        foreach($materials_data as $material){
            $materials_array[] = array(
                'Código' => $material->code,
                'Descripción' => $material->description,
                'Fecha de ingreso' => $material->created_at,
                'Fecha de última salida' => $material->updated_at,
                'Cantidad' => $material->quantity,
                'Unidad de almacenaje' => $material->unity,
                'Costo Unitario' => $material->unitary_cost,
                'Costo Total' => $material->total_cost
            );
        }
        Excel::create('Reporte de Materiales', function($excel) use ($materials_array){
            $excel->setTitle('Reporte de Materiales');
            $excel->sheet('Materiales', function($sheet) use ($materials_array){
                $sheet->fromArray($materials_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
}

?>