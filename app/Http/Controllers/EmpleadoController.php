<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store(Request $request){
        $empData = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'post' => $request->post
        ];
        Empleado::create($empData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function fetchAll(){
        $emps = Empleado::all();
        $output = '';
        if($emps->count() > 0){
            $output .= '<table class="table table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellido</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Telefono</th>
                        <th class="text-center">Cargo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>';
                foreach($emps as $emp){
                    $output .= '<tr>
                        <td class="text-center">'.$emp->id.'</td>
                        <td class="text-center">'.$emp->nombre.'</td>
                        <td class="text-center">'.$emp->apellido.'</td>
                        <td class="text-center">'.$emp->email.'</td>
                        <td class="text-center">'.$emp->telefono.'</td>
                        <td class="text-center">'.$emp->post.'</td>
                        <td class="text-center">
                            <a href="#" id="'.$emp->id.'" class="text-success mx-1 editarIcon" 
                            data-bs-toggle="modal" data-bs-target="#editarEmpleadoModal"><i class="
                            bi-pencil-square h4"></i></a>

                            <a href="#" id="'.$emp->id.'" class="text-danger mx-1 eliminarIcon"><i class="
                            bi-trash h4"></i></a>
                        </td>
                    </tr>';
                }
                $output .= '</tbody></table>';
                echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">
            No hay ningún registro presente en la base de datos</h1>';
        }
    }

    public function editar(Request $request){
        $id = $request->id;
        $emp = Empleado::find($id);
        return response()->json($emp);
    }

    public function actualizar(Request $request){
        $fileNombre = '';
        $emp = Empleado::find($request->id);
        $empData = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'post' => $request->post
        ];
        $emp->update($empData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function eliminar(Request $request){
        $id = $request->id;
        $emp = Empleado::find($id);
        if($emp){
            $emp->delete();
        }
    }
}
