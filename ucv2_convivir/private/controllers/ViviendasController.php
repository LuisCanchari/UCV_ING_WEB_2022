<?php
class ViviendasController extends Controller

{
    public function index()
    {
        $this->view('viviendas\index');
    }

    public function create()
    {
        $this->view('viviendas\create');
    }

    public function show($id=null)
    {
        $this->view('viviendas\show');
    }

    public function edit($id=null)
    {
        $this->view('viviendas\edit');
    }

    public function store()
    {
        $this->redirect('viviendas');
    }

    public function update()
    {
        $this->redirect('viviendas');
    }
}