<?php

namespace App\Filters;

class PropertyFilter extends QueryFilter{
    public function number_of_guests($number){

        return $this->builder->when($number, function($query) use($number){
            if ($number === '-1') {
                $query->where('number_of_guests', '>', 3);
            } else {
                $query->where('number_of_guests', $number);
            }
        });
    }

    public function number_of_rooms($number){

        return $this->builder->when($number, function($query) use($number){
            if ($number === '-1') {
                $query->where('number_of_rooms', '>', 3);
            } else {
                $query->where('number_of_rooms', $number);
            }
        });
    }
}
