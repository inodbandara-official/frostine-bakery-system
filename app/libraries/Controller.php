<?php
class Controller{
  //load model
  public function model($model){
     require_once '../app/models/'. $model.'.php';
     //initiate the model and pass it to the controller  member variable
     return new $model();
  }
  //load view
  public function view($view,$data = []){
     if(file_exists('../app/views/'.$view.'.php')){
       require_once '../app/views/'.$view.'.php';
     }
     else{
      die('coressponding  view not appear');
     }
  }
}
?>