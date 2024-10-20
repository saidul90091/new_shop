<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{

    public function user(){
        return $this->HasOne('App\Models\user', 'id', 'user_id');
    }
    public function product(){
        return $this->HasOne('App\Models\product', 'id', 'product_id');
    }



    use HasFactory;
}
