<?PHP
    include("configConexion.php");
	/*$conexion=mysql_pconnect("$sitio", "$usuario", "$pass");*/

    $mysql = new mysqli($sitio, $usuario, $pass, $base, $port);

    $user = $_GET['usuario'];
    $pass = $_GET['password'];
    $resultados = array();
    $clave = "";
    if ($mysql->connect_error) {
        echo "Falló la conexión a MySQL: (".$mysql->connect_error.") ".$mysql->connect_error;
    }

    $result = $mysql->query("CALL p_selectClaveCliente('".$user."')");
    $resultados["validacion"] = "ERROR";
    while ($row = mysqli_fetch_array($result, MYSQL_BOTH)){  
        $clave = $row[0];
        if ($pass==$clave)
        {
            $resultados["validacion"] = "OK";
        }else{
            $resultados["validacion"] = "ERROR";
        }
    }
    
    //$resultados["validacion"] = $user . " " . $pass . " " . $clave;
    /*convierte los resultados a formato json*/
    $resultadosJson = json_encode($resultados);

    /*muestra el resultado en un formato que no da problemas de seguridad en browsers */
    echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>