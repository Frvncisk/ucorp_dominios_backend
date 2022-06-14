<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Tbl_computador extends Model
{
    use HasFactory;

    protected $table = 'tbl_computadores';

    protected $fillable = [
        'modelo_id' ,
        'personal_id' ,
        'codigo' ,
    ];

    public function scopeActive($query)
    {
        $query->where('activo', 1);
    }

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Tbl_computadores_modelo::class, 'modelo_id', 'id');
    }

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Tbl_personal::class, 'personal_id', 'id');
    }

}
