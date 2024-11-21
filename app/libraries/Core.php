<?php
   class core{
    //url format-->/controller/method/param
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $param =[];

    public function __construct(){
         //print_r($this ->getURL());
         $url = $this ->getUrl();

         if(file_exists('../app/controllers/'. ucwords($url[0]).'.php')){
             $this->currentController = ucwords($url[0]);
             unset($url[0]);
         
         require_once '../app/controllers/'.$this->currentController.'.php';
         $this->currentController = new $this->currentController;

         //check whether the methd exixts in the controller or not
         if(isset($url[1])){
             if(method_exists($this->currentController, $url[1])){
                 $this->currentMethod = $url[1];
                 unset($url[1]);
             }
         }
        //get parameters list
         $this->params = $url ? array_values($url) : [];

         //call the method and pass parameters
         call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
         
    }
  }
    public function getUrl(){
       if(isset($_GET['url'])){
           $url = rtrim($_GET['url'], '/');
           $url = filter_var($url, FILTER_SANITIZE_URL);
           $url = explode('/', $url);

           return $url;
    }
   }
  }
?>