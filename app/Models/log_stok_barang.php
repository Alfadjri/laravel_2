<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_stok_barang extends Model
{
    use HasFactory;

    protected $table = "log_stok_barnags";
    protected $primaryKey = "id";

    protected $fillable = [
        'id_barang',
        'jumlah_barang',
    ];
}
