<?php
    function make_message($description='', $title='', $type= ''){
        //Se mandan a traer las alertas en un momento determinado, trayendo un archivo tempral
        session();

        $message = array(
            'desc' => $description,
            'title' => $title,
            'alert' => $type
        );

        session() ->set('message', $message);

    }//end crear un mensaje de manera dinamica


    function show_message(){
        $html='';

        $session = session();

        if($session->get('message') == null){
            return $html;
        }

        $html="

          toastr.".$session->get('message')['alert'].
          "('".$session->get('message')['desc']."',
          '".$session->get('message')['title']."');

        ";

        return $html;


    }// end
?>