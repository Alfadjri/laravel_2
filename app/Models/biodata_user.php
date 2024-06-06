<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

// model
use App\Models\User as User;

class biodata_user extends Model
{
    use HasFactory;

    protected $table = "biodata_users";
    protected $primaryKey = "id";

    protected $fillable  = [
        'nama_lengkap',
        'no_handphone',
        'alamat',
        'user_id',
        'image',
    ];

    public function User() : HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
