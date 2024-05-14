<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'prix_ht',
        'taux_tva'
    ];

    public function lignesFacture()
    {
        return $this->hasMany(LigneFacture::class, 'service_id');
    }
}
