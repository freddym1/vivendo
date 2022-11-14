<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Categoria;
use App\Models\Departamento;

class ProyectoController extends Controller
{
    
    //ver todos los proyectos
    public function listaProyectos()
    {
        $proyectos = Proyecto::get();
        
        $res = [];
        foreach ($proyectos as $key => $value) {
            array_push($res, 
                        [ "id" => $value['id'], 
                        "nombre" => $value['nombre'], 
                        "precio" => $value['precio'], 
                        "categoria" => $value->categoria['nombre'],
                        "ciudad" => $value->ciudad['nombre'],
                        "departamento" => $value->departamento['nombre'],
                        "imagen" => $value->imagen ? $value->imagen['archivo'] : "",
                        ]
                    );
        }

        return $res;
    }

    //ver proyectos por ciudad
    public function proyectosPorCiudad($id)
    {
        $proyectos = Proyecto::join('ciudad','proyecto.ciudad_id',"=",'ciudad.id')
                            ->where('ciudad_id',"=",$id)
                            ->orWhere('ciudad.nombre','=',$id)
                            ->get();

        $res = [];
        foreach ($proyectos as $key => $value) {
            array_push($res, 
                        [ "id" => $value['id'], 
                        "nombre" => $value['nombre'], 
                        "precio" => $value['precio'], 
                        "categoria" => $value->categoria['nombre'],
                        "ciudad" => $value->ciudad['nombre'],
                        "departamento" => $value->departamento['nombre'],
                        "imagen" => $value->imagen ? $value->imagen['archivo'] : "",
                        ]
                    );
        }
        
        return $res;
    }

    //ver proyectos por categoría
    public function proyectosPorCategoria($id)
    {
        $proyectos = Proyecto::join('categoria','proyecto.categoria_id',"=",'categoria.id')
                            ->where('categoria_id',"=",$id)
                            ->orWhere('categoria.nombre','=',$id)
                            ->get();

        $res = [];
        foreach ($proyectos as $key => $value) {
            array_push($res, 
                        [ "id" => $value['id'], 
                        "nombre" => $value['nombre'], 
                        "precio" => $value['precio'], 
                        "categoria" => $value->categoria['nombre'],
                        "ciudad" => $value->ciudad['nombre'],
                        "departamento" => $value->departamento['nombre'],
                        "imagen" => $value->imagen ? $value->imagen['archivo'] : "",
                        ]
                    );
        }
        
        return $res;
    }

    //ver proyectos por departamento
    public function proyectosPorDepartamento($id)
    {
        $proyectos = Proyecto::join('categoria','proyecto.categoria_id',"=",'categoria.id')
            ->join("ciudad","proyecto.ciudad_id","=","ciudad.id")
            ->join("departamento","ciudad.departamento_id","=","departamento.id")
            ->join('constructora','proyecto.constructora_id',"=",'constructora.id')
            ->select('proyecto.id','proyecto.nombre','proyecto.precio','categoria.nombre as categoria','ciudad.nombre as ciudad','departamento.nombre as departamento','constructora.nombre as constructora')
            ->where('departamento.id','=',$id)
            ->orWhere('departamento.nombre','=',$id)
            ->get();  

        $res = [];
        foreach ($proyectos as $key => $value) {
            array_push($res, 
                        [ "id" => $value['id'],
                            "nombre" => $value['nombre'], 
                            "precio" => $value['precio'], 
                            "categoria" => $value['categoria'],
                            "ciudad" => $value['ciudad'],
                            "departamento" => $value['departamento'],
                        ]
                    );
        }
        
        return $res;
    }
 
    //ver proyectos por id
    public function proyectoPorId($id)
    {
        $proyectos = Proyecto::where('id',"=",$id)
                            ->orWhere('nombre','=',$id)
                            ->get();

        $res = [];
        foreach ($proyectos as $key => $value) {
            array_push($res, 
                        [ "id" => $value['id'], 
                        "nombre" => $value['nombre'], 
                        "precio" => $value['precio'], 
                        "categoria" => $value->categoria['nombre'],
                        "constructora" => $value->constructora['nombre'],
                        "ciudad" => $value->ciudad['nombre'],
                        "departamento" => $value->departamento['nombre'],
                        "imagen" => $value->imagen ? $value->imagen['archivo'] : ""
                        ]
                    );
        }
        
        return $res; 
    }

}
