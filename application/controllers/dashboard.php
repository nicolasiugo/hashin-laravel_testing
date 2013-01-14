<?php

class Dashboard_Controller extends Base_Controller
{
    public function action_index()
    {
        $photos = Auth::user()->photos()->order_by('created_at', 'desc')->order_by('id', 'desc')->get();
        $photos = array();
        return View::make('dashboard.index', array('photos' => $photos));
    }
}