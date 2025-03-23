<?php

namespace App\Controllers;

class Home extends BaseController
{
    /*
    *How to declarate a function 
        ma : modificador de acceso
        [ma] function nameFunction(arguments){
            //Stament
            ruturn ;
        }
    */
    /// Main - index
    public function index()
    {
        //Calling view 
        return view('welcome_message');
    }

    public function hello(){
       // echo 'Welcome to new Adventure';

       //calling another method
       return $this->index();
    }//end hello
}
