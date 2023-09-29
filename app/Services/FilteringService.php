<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Compatibility;
use App\Models\Module;
use Illuminate\Http\Request;

class FilteringService

{

    public static function filterByCategory(Request $request)
    {
        /*$query = Module::select('modules.*');

        $query->join('modules', 'modules.id_category','=', 'categories.id')
            ->where(function($q){
                $q->where('modules.id_category', '=', 'categories.id');
            })->get();*/
        $array_values = array_values($request->categories);
        foreach ($array_values as $k => $v) {
            $array_values[$k] = intval($v);
        }

        $query = Module::select('modules.*');
        $query->join('categories_modules', 'categories_modules.module_id', '=', 'modules.id')->join('categories', 'categories.id', '=', 'categories_modules.category_id')
            ->whereIn('categories.id', array_values($array_values))->get();

        return $query;
    }

    public static function filterByPrice(Request $request)
    {
        $min_price = $request->input('minprice');
        $max_price = $request->input('maxprice');
        $query = Module::select('modules.*');

        $query->where('modules', 'modules.id_price')
            ->wherebetween('modules.id_price', [$min_price, $max_price])
            ->get();

        return $query;
    }

    public static function filterByPlatform()
    {
        $query = Module::select('modules.*');

        $query->join('modules', 'modules.id_platform', 'platforms.id')
            ->where(function ($q) {
                $q->where('modules.id_platform', '=', 'platforms.id');
            })->get();

        return $query;
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
