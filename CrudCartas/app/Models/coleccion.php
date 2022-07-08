<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coleccion extends Model
{
    use HasFactory;
    protected $table='coleccion';
    public $timestamps=false;
    protected $fillable=['Descripcion',
    'Fecha',
    'Tipo_col_iD',
    'Perfil_id'];
}
