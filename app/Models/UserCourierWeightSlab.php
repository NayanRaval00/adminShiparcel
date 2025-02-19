<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserCourierWeightSlab extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'courier_company_id', 'courier_weight_slab_id', 'is_enabled'];

    public function company(): HasOne
    {
        return $this->hasOne(CourierCompany::class, 'id', 'courier_company_id');
    }

    public function weightSlabs()
    {
        return $this->hasMany(CourierWeightSlab::class, 'id', 'courier_weight_slab_id');
    }
}
