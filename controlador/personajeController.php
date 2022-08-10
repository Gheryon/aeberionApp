<?php
include_once '../modelo/personaje.php';
$personaje=new Personaje();
//$id_usuario=$_SESSION['usuario'];
//nombre, apellidos, descripcion, personalidad, deseos, miedos, magia, historia, religion, familia, politica, retrato, especie, sexo
if($_POST['funcion']=='crear_nuevo_personaje'){
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $descripcion=$_POST['descripcion'];
    $personalidad=$_POST['personalidad'];
    $deseos=$_POST['deseos'];
    $miedos=$_POST['miedos'];
    $magia=$_POST['magia'];
    $historia=$_POST['historia'];
    $religion=$_POST['religion'];
    $familia=$_POST['familia'];
    $politica=$_POST['politica'];
    //$retrato=$_POST['retrato'];
    $especie=$_POST['especie'];
    $sexo=$_POST['sexo'];

    $retrato='imagenes/default.jpg';
    $personaje->nuevoPersonaje($nombre, $apellidos, $descripcion, $personalidad, $deseos, $miedos, $magia, $historia, $religion, $familia, $politica, $retrato, $especie, $sexo);
}

if($_POST['funcion']=='buscar_personajes'){
    $json=array();
    //$fecha_actual=new DateTime();
    $personaje->buscar();
    foreach ($personaje->objetos as $objeto) {
        //$nacimiento=new DateTime($objeto->edad);
        //$edad=$nacimiento->diff($fecha_actual);
        $json[]=array(
            'id'=>$objeto->id,
            'nombre'=>$objeto->nombre,
            'apellidos'=>$objeto->apellidos,
            'descripcion'=>$objeto->descripcion,
            'personalidad'=>$objeto->personalidad,
            'deseos'=>$objeto->deseos,
            'miedos'=>$objeto->miedos,
            'magia'=>$objeto->magia,
            'historia'=>$objeto->historia,
            'religion'=>$objeto->religion,
            'familia'=>$objeto->familia,
            'politica'=>$objeto->politica,
            'retrato'=>'../imagenes/Retratos/'.$objeto->retrato,
            'especie'=>$objeto->especie,
            'sexo'=>$objeto->sexo
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion']=='borrar_personaje'){
    $id_borrado=$_POST['id_personaje'];
    $personaje->borrarPersonaje($id_borrado);
}

if($_POST['funcion']=='capturar_datos'){
    $json=array();
    //$id_personaje=$_POST['id_personaje'];
    //$personaje->obtener_personaje($id_personaje);
    //$personaje->obtener_personaje($_POST['id_personaje']);
    $objeto=$personaje->getPersonaje($_POST['id_personaje']);
    //foreach ($personaje->objetos as $objeto) {
        $json[]=array(
            'nombre'=>$objeto->Nombre,
            'apellidos'=>$objeto->Apellidos,
            'personalidad'=>$objeto->Personalidad,
            'deseos'=>$objeto->Deseos,
            'miedos'=>$objeto->Miedos,
            'magia'=>$objeto->Magia,
            'historia'=>$objeto->Historia,
            'religion'=>$objeto->Religion,
            'familia'=>$objeto->Familia,
            'politica'=>$objeto->Politica,
            'retrato'=>$objeto->Retrato,
            'especie'=>$objeto->Especie,
            'sexo'=>$objeto->Sexo
        );
    //}
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
    //echo $_POST['id_personaje']."id";
}
/*if($_POST['funcion']=='buscar_usuario'){
    $json=array();
    $fecha_actual=new DateTime();
    $usuario->obtener_datos($_POST['dato']);
    //el json contiene todos los datos de la tabla de la db
    foreach ($usuario->objetos as $objeto) {
        $nacimiento=new DateTime($objeto->edad);
        $edad=$nacimiento->diff($fecha_actual);
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellidos_us,
            'edad'=>$edad->y,
            'dni'=>$objeto->dni_us,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us,
            'avatar'=>'../img/'.$objeto->avatar
        );
    }
    //codifica el json en string, lo convierte en un string
    //se accede a la posicion 0 porque siempre va a haber una única coincidencia con los usuarios
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
}

if($_POST['funcion']=='editar_usuario'){
    $id_usuario=$_POST['id_usuario'];
    $telefono=$_POST['telefono'];
    $residencia=$_POST['residencia'];
    $correo=$_POST['correo'];
    $sexo=$_POST['sexo'];
    $adicional=$_POST['adicional'];
    $usuario->editar($id_usuario, $telefono, $residencia, $correo, $sexo, $adicional);
    echo 'editado';
}

if($_POST['funcion']=='cambiar_contra'){
    $id_usuario=$_POST['id_usuario'];
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $usuario->cambiar_contra($id_usuario, $oldpass, $newpass);
}

if($_POST['funcion']=='cambiar_avatar'){
    if(($_FILES['avatar']['type']=='image/jpg')||($_FILES['avatar']['type']=='image/jpeg')||($_FILES['avatar']['type']=='image/png')||($_FILES['avatar']['type']=='image/gif'))
    {
        $nombre=uniqid().'-'.$_FILES['avatar']['name'];
        $ruta='../img/'.$nombre;
        move_uploaded_file($_FILES['avatar']['tmp_name'],$ruta);
        $usuario->cambiar_avatar($id_usuario, $nombre);
        foreach ($usuario->objetos as $objeto) {
            unlink('../img/'.$objeto->avatar);
        }
        $json=array();
        $json[]=array(
            'ruta'=>$ruta,
            'alert'=>'edit'
        );
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;
    }else{
        $json=array();
        $json[]=array(
            'alert'=>'noedit'
        );
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;
    }
}*/
?>
