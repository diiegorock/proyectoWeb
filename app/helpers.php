<?php 

    function getUserPermisos($role){
    	switch ($role) {
            case 1:
                return 'Administrador';
                break;
            case 2:
                return 'Propietario';
                break;
            case 3:
                return 'Personal';
                break;
        }
    }

?>