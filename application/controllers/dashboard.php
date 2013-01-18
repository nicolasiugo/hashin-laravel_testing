<?php

class Dashboard_Controller extends Base_Controller
{
    public function action_index()
    {
        //$photos = Auth::user()->photos()->order_by('created_at', 'desc')->order_by('id', 'desc')->get();
        $empleado = Employee::find(1);
        $vacaciones = $empleado->vacations()->get();
        return View::make('dashboard.index', array('vacations' => $vacaciones));
    }
}