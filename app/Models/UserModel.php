<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $table = 'm_user';

    // Mendefinisikan primary key dari tabel yang digunakan
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    // protected $fillable = ['level_id', 'username', 'nama', 'password'];

    protected $fillable = ['level_id', 'username', 'nama'];
}