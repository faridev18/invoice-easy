<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'facture_id',
        'date_paiement',
        'montant_paiement',
        'mode_paiement'
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class, 'facture_id');
    }
}
