<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $table = 'supplies';
    protected $guarded = false;

    public function shipments(){
        return $this->hasMany(Shipment::class,'supply_id', 'supply_id', 'id');
    }
}
