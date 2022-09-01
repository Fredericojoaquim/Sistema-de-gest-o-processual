<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoExpediente extends Model
{
    use HasFactory;
    protected $table='historico_expedientes';
    protected $guarded=[];

    
   public function expedientes(){
        return $this->belongsTo(ExpedienteModel::class);
    }
    
}
