<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vianda extends Model
{
    //
    protected $fillable = ['nombre', 'descripcion', 'vegetariana', 'precio'];
    public function pedidos(){
      return $this->hasMany('App\Pedido');
    }
}
