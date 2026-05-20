<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';

    protected $primaryKey = 'id_provincia';

    public $timestamps = false;

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }
}