<?php
include '../modelo/articulo.php';

$articulo=new Articulo();

if($_POST['funcion']=='crear')
{
    $nombre = $_POST['nombre_articulo'];
    $contenido = $_POST['contenido_articulo'];
    $articulo->crear($nombre, $contenido);
}

if($_POST['funcion']=='editar')
{
    $nombre = $_POST['nombre_articulo'];
    $contenido = $_POST['contenido_articulo'];
    $id_editado = $_POST['id_editado'];
    $articulo->editar($nombre, $contenido, $id_editado);
}

if($_POST['funcion']=='buscar')
{
    $articulo->buscar();
    $json=array();
    foreach ($articulo->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_articulo,
            'nombre'=>$objeto->nombre,
            'contenido'=>$objeto->contenido
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='detalles')
{
    $json=array();
    $articulo->buscarArticulo($_POST['id']);
    foreach ($articulo->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_articulo,
            'nombre'=>$objeto->nombre,
            'contenido'=>$objeto->contenido
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
/*if($_POST['funcion']=='capturar_datos'){
    $json=array();
    $id_usuario=$_POST['id_usuario'];
    $usuario->obtener_datos($id_usuario);
    foreach ($usuario->objetos as $objeto) {
        $json[]=array(
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
        );
    }
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
}*/

if($_POST['funcion']=='borrar'){
    $id=$_POST['id'];
    $articulo->borrar($id);
}
?>