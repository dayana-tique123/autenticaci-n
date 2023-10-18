<?php
if(isset($_GET ['Enviar'])){
    $usuario = $_GET['Nombre'];
    $password = $_GET['Contraseña'];
    $conec = new mysqli('localhost', 'root', 'root', 'proyecto_tours_people');

    $consulta = "SELECT * FROM registro WHERE nombre='$nombre' AND contraseña='$password'";
    $resultado = $conec->query($consulta);

    if($resultado==true){
        echo "esta bien";
        if($resultado->num_rows>0){
            while($fila=$resultado->fetch_assoc()){
                $nombres= $fila['nombre'];
                $email= $fila['correo'];

            }
            $resultado->close();
            header('location: desencriptar.php?mensaje=nombre: '. $nombres. ''. 'correo:'. $correo);
        }else{
            header('location: desencriptar.php?mensaje=mal');
        }
    }else{
        echo "esta mal";
    }

}else{
    echo 'malo chicaa';
}

