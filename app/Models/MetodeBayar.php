<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodeBayar extends Model
{
    use HasFactory;
    protected $table = 'metode_pembayaran';
    protected $guarded = ['id'];
}
