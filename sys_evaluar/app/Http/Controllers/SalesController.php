<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Brand;
use App\CarModel;

class SalesController extends Controller
{
    //
    public function filtroPersonas(Request $request)
    {
        if (isset($request->status)) {
            $carBuilder = Car::where('status', $request->status);
        } else {
            $carBuilder = Car::where('status', '>=', 0);
        }

        if (isset($request->year)) {
            $carBuilder = $carBuilder->where('year', $request->year);
        }

        if (isset($request->brand_id)) {
            $carBuilder = $carBuilder->where('brand_id', $request->brand_id);
        }

        if (isset($request->car_model_id)) {
            $carBuilder = $carBuilder->where('car_model_id', $request->car_model_id);
        }

        $sales = $carBuilder->get();

        $brands = Brand::all();
        $carmodels = CarModel::all();
        return view(
            'sales',
            [
                'cars' => $sales,
                'brands' => $brands,
                'models' => $carmodels
            ]

        );
    }

    public function filtersCarsU(Request $request)
    {
        /*
                $articulos = DB::table('posts')->orderBy('created_at','DESC')->take(4)->get();
                return view('home',['articulos'=>$articulos]
            ); */

        $carBuilder = Car::where('status', 0);

        if (isset($request->year)) {
            $carBuilder = $carBuilder->where('year', $request->year);
        }

        if (isset($request->brand_id)) {
            $carBuilder = $carBuilder->where('brand_id', $request->brand_id);
        }

        if (isset($request->car_model_id)) {
            $carBuilder = $carBuilder->where('car_model_id', $request->car_model_id);
        }

        $sales = $carBuilder->get();
        $brands = Brand::all();
        $carmodels = CarModel::all();
        return view(
            'sales',
            [
                'cars' => $sales,
                'brands' => $brands,
                'models' => $carmodels
            ]

        );
    }

    public function forModelos()
    {
        $listaMarcas = Brand::all();
        return view('sales')->with('listaMarcas', $listaMarcas);
    }
}
