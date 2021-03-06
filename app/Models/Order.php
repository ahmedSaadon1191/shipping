<?php

namespace App\Models;

use App\Models\Returns;
use App\Models\OrderDetailes;
use App\Models\ReturnsDetailes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    public $timestamps = true;
    protected $guarded = [];

    public function servant()
    {
        return $this->belongsTo('App\Models\Servant', 'servant_id')->withTrashed();
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id')->withTrashed();
    }

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate', 'governorate_id')->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id')->withTrashed();
    }

    public function orders_detailes()
    {
        return $this->hasMany(OrderDetailes::class)->withTrashed()->with('product');
    }
    public function returns_detailes()
    {
        return $this->hasMany(ReturnsDetailes::class)->withTrashed()->with('returns');
    }

    public function returns()
    {
        return $this->hasMany(Returns::class)->withTrashed();
    }
}
