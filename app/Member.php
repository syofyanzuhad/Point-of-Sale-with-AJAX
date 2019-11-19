<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
	protected $primaryKey = 'id_member';

	public function penjualan(){
        return $this->hasMany('App\Penjualan', 'id_supplier');
    }
}
