<?php

class About extends Controller
{
    public function index()
    {
        $this->template->content = 'about';
    }
}
