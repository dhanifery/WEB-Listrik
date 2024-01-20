<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifListrik extends Model
{
    use HasFactory ,HasFormatRupiah;
    
    protected $table = 'tarif_listrik';

    protected $fillable = [
        'kdTarif',
        'beban',
        'tarif_perkwh',
    ];
}
