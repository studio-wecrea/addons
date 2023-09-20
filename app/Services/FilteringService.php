<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Compatibility;
use App\Models\Module;
use Illuminate\Http\Client\Request;

class FilteringService

{

    public static function filterByCategory()
    {

        $query = Module::select('modules.*');

        $query->join('modules', 'modules.id_category', 'categories.id')
            ->where(function($q){
                $q->where('modules.id_category', '=', 'categories.id');
            });

    }

    public static function filterByPrice(Request $request)
    {
        $min_price = $request->input('minprice');
        $max_price = $request->input('maxprice');
        $query = Module::select('modules.*');

        $query->where('modules', 'modules.id_price')
                ->wherebetween('modules.id_price', [$min_price, $max_price])
                ->get();
        

    }

    public static function filterByPlatform()
    {
        $query = Module::select('modules.*');

        $query->join('modules', 'modules.id_platform', 'platforms.id' )
            ->where(function($q){
                $q->where('modules.id_platform', '=', 'platforms.id');
            });
    }

    public static function filterByName($filters)
    {
        return Module::where('name', 'ilike', '%' . $filters['search'] . '%')->get();
    }

    public static function filterByCompatibility()
    {
        // $query = Compatibility::select('compatibilities.*');

        // $query->join('')
    }
}