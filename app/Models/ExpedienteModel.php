<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedienteModel extends Model
{
    use HasFactory;

    protected $table='expedientes';
    protected $guarded=[];

    public function historico(){
        return $this->hasMany(HistoricoExpediente::class,'expediente_id','id');
    }
}
