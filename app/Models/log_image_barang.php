<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_image_barang extends Model
{
    use HasFactory;

    protected $table = "log_image_barangs";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_barang',
        'image_barang',
    ];
}
