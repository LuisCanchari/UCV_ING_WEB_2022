<?php
class GastosController extends Controller

{
    public function index()
    {
        $this->view('gastos\index');
    }

    public function create()
    {
        $this->view('gastos\create');
    }

    public function show($id=null)
    {
        $this->view('gastos\show');
    }

    public function edit($id=null)
    {
        $this->view('gastos\edit');
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
