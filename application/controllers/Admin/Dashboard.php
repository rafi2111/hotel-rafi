<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data=[
            'title' =>'Hotel-Ku | Dashboard',
            'judul' =>'Dashboard',
            'subjudul' =>'Dashboard',
            'breadcrumb1' =>'Dashboard',
        ];
        $this->template->load('Admin/Template', 'Admin/Dashboard/index', $data);
     }
}