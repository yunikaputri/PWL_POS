<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;

// class UserModel  extends Authenticatable
// {
//     use HasFactory;

//     protected $table = 'm_user';
//     protected $primaryKey = 'user_id';
// protected $fillable =['level_id', 'username', 'nama', 'password', 'created_at', 'avatar', 'updated_at'];

//     protected $hidden = ['password']; // jangan di tampilkan saat select

//     protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash

//     /**
//      * Relasi ke tabel
//      */
//     public function level(): BelongsTo{
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }

//     /**
//      * Mendapatkan nama role
//      */
//     public function getRoleName(): string
//     {
//         return $this->level->level_nama;
//     }

//     /*
//      * Cek apakah user memiliki role tertentu
//      */
//     public function hasRole($role): bool
//     {
//         return $this->level->level_kode == $role;
//     }

//     /*
//      * Mendapatkan kode role
//      */
//     public function getRole()
//     {
//         return $this->level->level_kode;
//     }
// }

class UserModel extends Authenticatable implements JWTSubject
{

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'nama',
        'password',
        'level_id',
        'image' //tambahan
    ];

    public function level()
    {
        return $this->belongsTo(
            LevelModel::class,
            'level_id',
            'level_id'
        );
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => url('/storage/posts/' . $image),
        );
    }

    use HasFactory;

    protected $hidden = ['password']; // jangan di tampilkan saat select

    protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash

    /**
     * Mendapatkan nama role
     */
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    /*
     * Cek apakah user memiliki role tertentu
     */
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }

    /*
     * Mendapatkan kode role
     */
    public function getRole()
    {
        return $this->level->level_kode;
    }
}