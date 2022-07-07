<?php
class App{
    protected $controller = "home";
    protected $method = "index";
    protected $params = array();

    public function __construct(){
        //echo "Constructor de la app";
        //echo "<br>";
        
        $URL = $this->getURL();
        $controladorClass = ucfirst(strtolower($URL[0]))."Controller";
        $controladorFile =  "../private/controllers/".$controladorClass.".php";
        
        if (file_exists($controladorFile)){
            $this->controller = $controladorClass;
            unset($URL[0]);
        }else{
            $controladorClass = 'ErrorController';
            $controladorFile = "../private/controllers/HomeController.php";
            $this->controller = $controladorClass;
        }
 
        require "../private/controllers/".$this->controller.".php";
        $this->controller = new $this->controller();

        if (isset($URL[1]))
        {
            if (method_exists($this->controller, $URL[1]))
            {
                $this->method= strtolower($URL[1]);
                unset($URL[1]);
            }
        }

        $URL = array_values($URL);
        $this->params = $URL;

        call_user_func_array([$this->controller,$this->method], $this->params);
    }

    private function getURL(){
        $req = array();
        $url = isset($_GET['url'])?$_GET['url']:"home";
        $req = explode("/",filter_var((trim($url,"/")),FILTER_SANITIZE_URL));
        return ($req);
    }

}