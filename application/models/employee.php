<?php

class Employee extends Eloquent {
    
    public static $timestamps = true;


    public function vacations()
    {
        return $this->has_many('Vacation');
    }
   
}