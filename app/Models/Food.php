<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'kcal', 'protein', 'fat', 'carbs', 'micronutrients', 'tags'];
    protected $casts = [
        'micronutrients' => 'json'
    ];
    
    public function totalNutrition(float $amount, $units = 'g') {
        if ($units == 'oz') {
            $multiplier = $amount * 28.3495 * 0.01;
        } else {
            $multiplier = $amount * 0.01;
        }

        $totalNutrition = new \stdClass();

        $totalNutrition->kcal = $this->kcal * $multiplier;
        $totalNutrition->protein = $this->protein * $multiplier;
        $totalNutrition->fat = $this->fat * $multiplier;
        $totalNutrition->carbs = $this->carbs * $multiplier;
        $totalNutrition->micronutrients = json_decode($this->micronutrients, true);

        foreach ($totalNutrition->micronutrients as $key => $value) {
            $totalNutrition->micronutrients[$key] = $value * $multiplier;
        }
        
        return $totalNutrition;
    }


}
