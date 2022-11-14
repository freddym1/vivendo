<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesado extends Model
{
    use HasFactory;
    protected $table = 'interesado';
    // protected $guarded = []; 

    public function proyecto(){
        return $this->belongsTo(Proyecto::class, 'proyecto_id','id');
    }

}
