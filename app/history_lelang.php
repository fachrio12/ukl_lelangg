<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class history_lelang extends Model
{
    protected $table ='barang';
    public $timestamps =false;

    protected $fillable =['id_lelang','id_barang','id_masyarakat','penawaran_harga'];
}