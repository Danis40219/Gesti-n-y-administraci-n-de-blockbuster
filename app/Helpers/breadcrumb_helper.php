<?php
    function breadcrumb_panel($title='', $breadcrumb=array()){
      $html='';
        $html='
        <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">'.$title.'</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="'.route_to("dashboard").'"><i class="fa fa-home" aria-hidden="true"></i></a></li>';
            //<li class="breadcrumb-item"><a href="#">Inicio</a></li>
             // <li class="breadcrumb-item"><a href="#">Modulo principal</a></li>
              //<li class="breadcrumb-item active">Modulo actual</li>
              //d($breadcrumb);
              foreach($breadcrumb as $bd)
              {
                //se divide en sub-arreglitos y para saber si es activo o no es determinarlo
                //dd($bd);
                if($bd["href"] !="#"){
                  $html.='<li class="breadcrumb-item"><a href="'.$bd["href"].'">'.$bd["titulo"].'</a></li>';
                }
                else{
                  $html.='<li class="breadcrumb-item active">'.$bd["titulo"].'</li>';
                }//end else

              }//end foreach
            $html.='</ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
        ';
        return $html;

    }//end

    ///Tratear de generar una ide de que la parte hacer que se repita n veces si tiene hipervinvulo o no traer un arreglo para mostrar algo lineas 12 y 13