<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';

    protected $primaryKey = 'id_distrito';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'id_provincia',
        'id_zona'
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'id_provincia');
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_zona');
    }
}