<?php
class ResidentesController extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $query = "select * from personas";
        $persona =  new Persona();

        $data = $persona->query($query);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Personas', 'personas'];

        $this->view('personas\index', [
            'rows' => $data,
            'crumbs' => $crumbs
        ]);
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

    public function destroy()
    {
        $this->redirect('viviendas');
    }
}
