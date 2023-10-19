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

        // on souhaite les modules
        $query = Module::select("modules.*");

        if(!empty($selectedCategories)){
            // on a besoin des catégories en relation avec les modules
            $query->join('categories_modules', 'modules.id', '=', 'categories_modules.module_id');

            if(!empty($selectedPlatforms)){
                // On filtre les catégories et les plateformes
                $query->where(function ($subquery) use ($selectedCategories, $selectedPlatforms) {
                    $subquery->whereIn('categories_modules.category_id', $selectedCategories)
                        ->orWhereIn('modules.platform_id', $selectedPlatforms);
                });
            }else{
                $query->whereIn('categories_modules.category_id', $selectedCategories);
            }
        }

        // si on veut filtrer les prix
        if(!empty($minPrice) && !empty($maxPrice)){
            $query->whereBetween('modules.price', [(int) $minPrice, (int) $maxPrice]);
        }

        $query->distinct();

        return $query->paginate($perPage);
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
