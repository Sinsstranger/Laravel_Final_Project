<?php

namespace App\Filters;

class PropertyFilter extends QueryFilter{
    public function guests($number){

        return $this->builder->when($number, function($query) use($number){
            if ($number === '-1') {
                $query->where('number_of_guests', '>', 3);
            } else {
                $query->where('number_of_guests', $number);
            }
        });
    }

    public function rooms($number){

        return $this->builder->when($number, function($query) use($number){
            if ($number === '-1') {
                $query->where('number_of_rooms', '>', 3);
            } else {
                $query->where('number_of_rooms', $number);
            }
        });
    }

    public function categories($string){

        $categoriesArray = explode(',', $string);

        return $this->builder->when($categoriesArray, function($query) use($categoriesArray){
                $query->whereIn('category_id', $categoriesArray);
        });
    }

    public function daily($string) {

        return $this->builder->when($string, function($query) use($string){
            if ($string !== 'any') {
                $query->where('daily_rent', $string === 'true' ? true : false);
            }
        });
    }

    public function price($string) {

        return $this->builder->when($string, function($query) use($string){
            $prices = explode(',', $string);
            if (!$prices[1]) {
                $query->where('price_per_day', '>', $prices[0]);
            } else {
                $query->whereBetween('price_per_day', $prices);
            }
        });
    }
}
