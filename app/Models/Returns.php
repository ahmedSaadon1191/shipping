<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Returns extends Model
{
    use SoftDeletes;

    protected $table = 'returns';
    public $timestamps = true;
    protected $guarded = [];
    

    public function cities()
    {
        return $this->belongsTo('App\Models\City', 'city_id')->withTrashed();
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id')->withTrashed();
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id')->withTrashed();
    }


    public function orders()
    {
        return $this->belongsTo('App\Models\Order', 'order_id')->withTrashed();
    }

   

    public function returnsDetailes()
    {
        return $this->hasMany('App\Models\ReturnsDetailes')->withTrashed();
    }

    public function servant()
    {
        return $this->belongsTo('App\Models\Servant', 'servant_id')->withTrashed();
    }
}
