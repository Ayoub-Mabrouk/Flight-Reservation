<?php

class HomeController {
    public function index($page){
        
      
           
        
            include('views/'.$page.'.php'); 
        }
           
        
    
    static public function logout(){
        session_destroy();
        Redirect::to('login');
    }
}