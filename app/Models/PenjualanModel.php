<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PenjualanModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
    protected $fillable = ['penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    public function detail(): HasMany
    {
        return $this->hasMany(DetailPenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }

    public function detailPenjualan() {
        return $this->hasMany(DetailPenjualanModel::class, 'penjualan_id');
    }
    
}