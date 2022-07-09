<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table ='barang';
    public $timestamps =false;

    protected $fillable =['nama_barang','tgl_daftar','harga_awal','deskripsi'];
}
