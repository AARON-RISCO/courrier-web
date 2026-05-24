<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteDestinatario extends Model
{
    protected $table = 'clientes_destinatarios';

    protected $primaryKey = 'id_cliente_destinatario';

    public $timestamps = false;

    protected $fillable = [
    'nombre',
    'telefono',
    'correo',
    'direccion',
    'referencia',
    'id_distrito'
];
    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'id_distrito');
    }
}

