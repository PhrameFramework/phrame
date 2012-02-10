<?php

class Home extends Controller
{
    public function index()
    {
        $this->template->content = new View(
            'home',
            array(
                'name' => 'World'
            )
        );
    }
}
