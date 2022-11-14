<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyecto';

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id','id');
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class, 'ciudad_id','id');
    }

    public function departamento(){
        return $this->hasOneThrough(Departamento::class, Ciudad::class,
            'id',
            'id',
            'ciudad_id',
            'departamento_id',
        );
    }

    public function constructora(){
        return $this->belongsTo(Constructora::class, 'constructora_id','id');
    }

    public function imagen(){
        return $this->hasOne(ProyectoImagen::class, 'proyecto_id','id');
    }

}
