<?php
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
?>
<html>
<head></head>
<body>
<?php    
    /** función que nos devuelve un número ganador dependiendo de un límite numérico que recibe como parámetro
    * @param int $limite 
    * @return int número aleatorio 
    */ 
    function ObtieneGanador($limite)
    {
        return rand(1,$limite); // se obtiene un número aleatorio
    }

    //se verifica que se hayan mandado las variables POST para que no se genere error. Con esta validación checo que venga del 
    // de inicio.php
    if( isset($_POST['nombre']) and isset($_POST['edad']) and isset($_POST['juego']) ){ 
        //Se obtiene del POST el nombre, juego, y edad
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $juego = $_POST["juego"];
        //se valida la edad del usuario 
        if ($edad < 18){
            echo <<<EOT0
                <br><br><br><center> Mi estimado <h1>$nombre</h1> <br>
                <h2>Estás muy joven para jugar!!!</h2> 
                <a href="inicio.php">Regresar</a></center>
            EOT0;
        }else{  //si es mayor de edad
            $nombre = ltrim(rtrim(strtoupper($nombre)));  //se le quitan espacios y se cambia a mayúsculas el nombre
            echo <<<EOT1
                <center><h1>Bienvenido $nombre<h1></center><br><br>
            EOT1;

            switch($juego){
                case "ruleta":
                    //se muestra formulario para el juego de ruleta
                    echo <<<EOT3
                        <center><h3>Vamos a jugar $juego</h3>
                        <form method="POST" action="casino.php"><br/><br/>
                        <input type="hidden" name="juego"  value="$juego"/>
                        Escribe tu apuesta: <input type="text" name="apuesta"/><br/><br/>
                        Selecciona un número para apostar:    
                        <select name="numero">                         
                    EOT3;
                    //se ocupa un do while para llenar los números de apuesta del 1 al 21
                    $numerosRuleta = 1;
                    do{
                        print "<option value=\"".$numerosRuleta."\">".$numerosRuleta."</option>";
                        $numerosRuleta++;                        
                    }while($numerosRuleta<=21);

                    echo <<<ruleta2
                            </select>                       
                            <br/><br/>
                            <input type="submit" value="Apostar"/>
                        </form></center>
                    ruleta2;
                break;
                case "blackjack":
                    //se muestra formulario para el juego de black jack
                    echo <<<EOT0
                        <br><br><br><center> Mi estimado <h1>$nombre</h1> <br>
                        <h2>Estamos trabajando para mejorar!!! Este juego aún no está en funcionamiento</h2> 
                        <a href="inicio.php">Regresar</a></center>
                    EOT0;

                break;
                case "sorteo":
                    //se muestra formulario para el juego de sorteo
                    echo <<<ruleta
                        <h3>Vamos a jugar $juego</h3>
                        <form method="POST" action="casino.php"><br/><br/>
                            <input type="hidden" name="juego"  value="$juego"/>
                            Escribe tu apuesta: <input type="text" name="apuesta"/><br/><br/>
                            Selecciona un número para apostar:    
                            <select name="numero">                         
                    ruleta;
                    //se ocupa un while para llenar los números de apuesta del 1 al 100 
                    //no es lo óptimo mostrar 100 números en un select pero sirve para la tarea,
                    //se ponen al revés solo para cambiarle y no sea similar al do while anterior
                    $numerosSorteo = 100;
                    while($numerosSorteo>0){
                        print "<option value=\"".$numerosSorteo."\">".$numerosSorteo."</option>";

                        $numerosSorteo--;
                        
                    }                    
                    echo <<<ruleta2
                            </select>                       
                            <br/><br/>
                            <input type="submit" value="Apostar"/>
                        </form>
                    ruleta2;


                break;
                default:
                    echo "No seleccionaste juego";

            }
        }
    }elseif( isset($_POST['juego']) and isset($_POST['apuesta']) and isset($_POST['numero']) ){
        //se valida que se hayan enviado las variables POST que se ocupan, estas acciones se realizan según el formulario del juego elegido
        //Aqui va todo lo de los juegos
        //se obitienen los valores de la apuesta 
        $apuesta = $_POST["apuesta"];
        $numero = $_POST["numero"];
        $juego = $_POST["juego"];
        switch($juego){
            case "ruleta":                
                //Se selecciona un número al azar y se manda mensaje cúal fue.
                $ganador = ObtieneGanador(21);
                echo <<<EOT
                <center><h1>El número ganador es......</h1> 
                <h2><b>$ganador</b></h2>
                EOT;
                 
                if ($ganador == $numero){ //si el número de la apuesta fue igual que el ganador
                    echo <<<EOT
                    <center><h1>Felicidades!!! Ganaste $apuesta!!!</h1> 
                    <a href="inicio.php">Seleccionar otro juego</a></center>
                    EOT;
                }else{ //si el número de la apuesta fue diferente que el ganador
                    echo <<<EOT
                        <center><h1>Lo siento mucho!!! Perdiste $apuesta!!!</h1> 
                        <h2>Toma chocolate, paga lo que debes!!</h2>
                        <a href="inicio.php">Seleccionar otro juego</a></center>
                    EOT;
                }     
            break;
            case "blackjack":
                //se muestra formulario para el juego de ruleta

                //Aún no se implementa esta función puede ser para los siguientes temas

            break;
            case "sorteo":
                //Se selecciona un número al azar y se manda mensaje cúal fue.
                $ganador = ObtieneGanador(100);
                echo <<<EOT
                <center><h1>El número ganador del sorteo es......</h1> 
                <h2><b>$ganador</b></h2>
                EOT;
                 
                if ($ganador == $numero){ //si el número de la apuesta fue igual que el ganador
                    echo <<<EOT
                    <center><h1>Felicidades!!! Ganaste $apuesta!!!</h1> 
                    <a href="inicio.php">Seleccionar otro juego</a></center>
                    EOT;
                }else{ //si el número de la apuesta fue diferente que el ganador
                    echo <<<EOT
                        <center><h1>Lo siento mucho!!! Perdiste $apuesta!!!</h1> 
                        <h2>Toma chocolate, paga lo que debes!!</h2>
                        <a href="inicio.php">Seleccionar otro juego</a></center>
                    EOT;
                }     
            break;
            default:
                echo "No seleccionaste juego";

        }  
    }else
    { //cierre de if de si se enviaron POST
        echo <<<EOT
            <h1>No puedes jugar sin seleccionar opciones.</h1>
            <a href="inicio.php">Ir a seleccionar opciones</a>
        EOT;
   }
?>
</body>
</html>