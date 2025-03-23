<?php

    /**
     * Nos va a permitir la creacion e instancia de
     * nuestro menu panel lateral de manera dinamica
     * [menu]
     *  [Opción A]
     *  [Opción B]
     *    [Opción B1]
     *    [Opción B2]
     * 
     *  [Opción C]
     *    [Opción C1]
     *      [Opción C1.1] 
     * 
     * 
     */

    function configurar_menu_panel($tarea_actual = '', $rol_actual = 0) {
        $session = session(); // Obtener sesión
        $rol_actual = $session->get('rol'); // Obtener rol del usuario

        //Permiet almacenar todas las opciones del menu
        $menu = array();

        //Permitir identifcar las caracteristicas de la opcion
        $menu_opcion = array();

        //Permitir identifcar las caracteristicas de la subopcion que se encuentra en la opcion principal
        $menu_subopcion = array();

        //Tarea dashboard
        $menu_opcion= array();
        $menu_opcion['is_active'] = ($tarea_actual == TAREA_DASHBOARD) ? TRUE : FALSE ;
        $menu_opcion['href'] = route_to("dashboard");
        $menu_opcion['text'] = 'Dashboard';
        $menu_opcion['icon'] = 'fa fa-desktop';
        $menu_opcion['submenu'] = array();
        $menu['dashboard'] = $menu_opcion;

        if ($rol_actual == ROL_ADMINISTRADOR['clave']) {
            $menu_opcion = array();
            $menu_opcion['is_active'] = ($tarea_actual == TAREA_USUARIOS) ? TRUE : FALSE;
            $menu_opcion['href'] = route_to("usuarios");
            $menu_opcion['text'] = 'Usuarios';
            $menu_opcion['icon'] = 'fa fa-users';
            $menu_opcion['submenu'] = array();
            $menu['usuarios'] = $menu_opcion;
        }

        //Ejemplo con opciones
        $menu_opcion= array();
        $menu_opcion['is_active'] = FALSE;
        $menu_opcion['href'] = "#";
        $menu_opcion['text'] = 'Opcion B';
        $menu_opcion['icon'] = 'fa fa-battery-full';
        $menu_opcion['submenu'] = array();

            $menu_opcion['submenu'] = array();
                $menu_subopcion = array();
                $menu_subopcion ['is_active'] = FALSE;
                $menu_subopcion ['href'] = route_to("dashboard");
                $menu_subopcion ['text'] = 'Opcion B1';
                $menu_subopcion ['icon'] = 'fa fa-battery-three-quarters';
            $menu_opcion['submenu']['opcionb1'] = $menu_subopcion;

            $menu_opcion['submenu'] = array();
                $menu_subopcion = array();
                $menu_subopcion ['is_active'] = FALSE;
                $menu_subopcion ['href'] = route_to("dashboard");
                $menu_subopcion ['text'] = 'Opcion B2';
                $menu_subopcion ['icon'] = 'fa fa-battery-half';
            $menu_opcion['submenu']['opcionb2'] = $menu_subopcion;

        $menu['opcionB'] = $menu_opcion;

        return $menu;
    }

    function crear_menu_panel($tarea_actual = '', $rol_actual = 0) {
        $menu = configurar_menu_panel($tarea_actual, $rol_actual);
        $html = '';
        $html.= '
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu Lateral</li>';
                foreach ($menu as $opcion) {
                    if($opcion["href"] != "#"){
                        $html.='
                            <li class="nav-item">
                                <a href="'.$opcion["href"].'" class="nav-link '.(($opcion["is_active"] == TRUE) ? "active" : "" ).'">
                                    <i class="'.$opcion["icon"].' nav-icon"></i>
                                    <p>'.$opcion["text"].'</p>
                                </a>
                            </li>
                        ';
                    }//end if
                    else {
                        $html.= '
                            <li class="nav-item">
                                <a href="#" class="nav-link '.(($opcion["is_active"] == TRUE) ? "active" : "" ).'">
                                    <i class="nav-icon '.$opcion["icon"].' "></i>
                                    <p>
                                        '.$opcion["text"].'
                                        <i class = "right fas fa-angle-left"></i>
                                    </p>
                                </a>';
                                if(sizeof($opcion["submenu"]) > 0 ){
                                    $html.='<ul class = "nav nav-treeview">';
                                    foreach ($opcion["submenu"] as $sub_opcion_menu){
                                        $html.='
                                            <li class="nav-item">
                                                <a href="#" class="nav-link '.(($sub_opcion_menu["is_active"] == TRUE) ? "active" : "" ).'">
                                                    <i class="'.$sub_opcion_menu["icon"].' nav-icon"></i>
                                                    <p>'.$sub_opcion_menu["text"].'</p>
                                                </a>
                                            </li>
                                        ';
                                    }
                                    $html.='</ul>';
                                }

                            $html.='</li>
                        ';
                    }//
                }
                
            $html.='</ul>';
        return $html;
    } 