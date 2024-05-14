<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_facture',
        'date_echeance',
        'objet',
        'montant_ht',
        'taux_tva',
        'montant_ttc',
        'etat_paiement',
        'mode_paiement',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lignesFacture()
    {
        return $this->hasMany(LigneFacture::class, 'facture_id');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'facture_id');
    }
}
