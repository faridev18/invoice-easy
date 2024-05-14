<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneFacture extends Model
{
    use HasFactory;
    protected $fillable = [
        'facture_id',
        'service_id',
        'description',
        'quantite',
        'prix_unitaire_ht',
        'taux_tva',
        'montant_ht',
        'montant_tva',
        'montant_ttc'
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class, 'facture_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
