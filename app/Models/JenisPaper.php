<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPaper extends Model
{
    use HasFactory;
    protected $table = 'tm_jenis_paper'; // mendevinisikan nama table
    protected $primaryKey = 'id_jenis_paper'; // mendevinisikan primary key
    public $incrementing = true; // auto pada primaryKey incremment true
    public $timestamps = true; // create_at dan update_at false

    // fillable mendevinisikan field mana saja yang dapat kita isikan
    protected $guarded = [];
}
