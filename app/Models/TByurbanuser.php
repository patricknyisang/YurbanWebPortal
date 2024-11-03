<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TByurbanuser extends Model
{
    protected $connection = "yurbanweb";
    public $table = "yurbanuser";
    public $primaryKey = "id";
    protected $guarded = [];
    public $timestamps = false;

    public static function getWhere(array $filter,$single = false)
    {
        $criteria = 'get';
        if ($single)
            $criteria = 'first';

        if ($filter)
            return DB::connection((new self())->connection)
                ->table((new self())->table)->select('*')
                ->where($filter)->$criteria();

        return self::all();
    }

    public function counties()
    {
       
        return $this->belongsTo(TBCounties::class,'county','id');
    }

    public function subcounties()
    {
       
        return $this->belongsTo(TBConstituencies::class,'subcounty','id');
    }

  
}
