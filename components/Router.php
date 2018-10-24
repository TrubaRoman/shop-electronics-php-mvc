<?php



/**
 * Description of Router
 *
 * @author r_truba
 */
class Router

{    private $routes;

    public function __construct()
    {
        $routesPatch = ROOT.'/config/routes.php';
        $this->routes = include($routesPatch);
    }
    
    /**
     * 
     * @return string
     * return request string
     */
    private function getURI()
    {
         if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

        public function run()
    {
        //Получити строку запиту
       
            $uri = $this->getURI();
                    //Провірити наявність такого запиту в routs
            foreach ($this->routes as $uriPattern => $Path){
                       //Якшо є, оприділити який контроллер і екшип буре управління
                if(preg_match("~$uriPattern~",$uri)){
                    $segments = explode('/', $Path);
                    $controllerName = array_shift($segments).'Controller';
                    $controllerName = ucfirst($controllerName);
                    
                    $actionName = 'action'.ucfirst(array_shift($segments));
                    
                    $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                    if(file_exists($controllerFile))
                    {
                        
                        require_once($controllerFile);
                        $controlerObject = new $controllerName;
                        $result = $controlerObject->$actionName();
                        if($result !=null)
                        {
                            break;
                        }
                    }
                }
            };

 
        //Підключити файл класу контроллера
        // створити обєкт, викликати метод 
    }       
}
