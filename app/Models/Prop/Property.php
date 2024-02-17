<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;
    public function homeType()
    {
        return $this->belongsTo(HomeType::class, 'home_type_id');
    }
}
