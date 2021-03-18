<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_lote',
        'fabricante',
        'qtdVacina',
        'segunda_dose',
        'data_fabricacao',
        'data_validade',
    ];

    public function postos()
    {
        return $this->belongsToMany(PostoVacinacao::class);
    }
}
