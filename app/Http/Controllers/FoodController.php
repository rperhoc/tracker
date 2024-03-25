<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return view('index', [
            'foods' => Food::all()
        ]);
    }

    public function nutritionTotals(Request $request)
    {
        $food = Food::findOrFail($request->input('foodId'));
        $amount = (int)$request->input('amount');
        $units = $request->input('units');

        $totalNutrition = $food->totalNutrition($amount, $units);

        $calories = $totalNutrition->kcal;
        $protein = $totalNutrition->protein;
        $fat = $totalNutrition->fat;
        $carbs = $totalNutrition->carbs;
        $micronutrients = $totalNutrition->micronutrients;

        return response()->json([
            'calories' => round($calories, 0),
            'protein' => round($protein, 1), 
            'fat' => round($fat, 1), 
            'carbs' => round($carbs, 1),
            'micronutrients' => $micronutrients
        ]);
        
    }
}
