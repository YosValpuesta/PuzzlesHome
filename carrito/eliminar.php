<?php 
session_start();
if (isset($_SESSION['Usuario'])) {
    $arreglo = $_SESSION['MiCarrito'];
    for ($i = 0; $i < count($arreglo); $i++) {
        if($arreglo[$i]['Id'] != $_POST['id']) {
            $arregloNuevo[] = array(
                            'Id'=> $arreglo[$i]['Id'],
                            'Nombre'=> $arreglo[$i]['Nombre'],
                            'Piezas' => $arreglo[$i]['Piezas'],
                            'Marca' => $arreglo[$i]['Marca'],
                            'Precio'=> $arreglo[$i]['Precio'],
                            'Imagen'=> $arreglo[$i]['Imagen'],
                            'Cantidad' => $arreglo[$i]['Cantidad']   
            );
        }
    }
    if (isset($arregloNuevo)) {
        $_SESSION['MiCarrito'] = $arregloNuevo;
    } else {
        //El registro a eliminar es el unico por ello elimina la sesion
        unset($_SESSION['MiCarrito']);
    }
}