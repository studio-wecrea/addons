<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Compatibility;
use App\Models\Module;
use Illuminate\Http\Request;

class FilteringService

{
    public static function multiFiltering(Request $request)
    {
        $selectedCategories = $request->input('categories', []);
        $selectedPlatforms = $request->input('platforms', []);
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');
        $perPage = 10;

     

        $filteredModules = Module::join('categories_modules', 'modules.id', '=', 'categories_modules.module_id')
        ->join('categories', 'categories.id', '=', 'categories_modules.category_id')
        ->join('platforms', 'modules.platform_id', '=', 'platforms.id')
        ->where(function ($query) use ($selectedCategories, $selectedPlatforms, $minPrice, $maxPrice) {
            $query->whereIn('categories.id', $selectedCategories)
                  ->orWhereIn('platforms.id', $selectedPlatforms);
                  if ($minPrice !== null || $maxPrice !== null) {
                    $query->whereBetween('modules.price', [$minPrice, $maxPrice]);
                }
        })
        ->distinct()
        ->paginate($perPage, ['modules.*']);

        // $filteredModules = Module::whereHas('categories', function ($query) use ($selectedCategories) {
        //     $query->whereIn('categories.id', $selectedCategories);
        // })
        // ->whereHas('platforms', function ($query) use ($selectedPlatforms) {
        //     $query->whereIn('id', $selectedPlatforms);
        // })
        // ->get();

        // Handle the filtered data as needed...

        return $filteredModules;
    }

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
