<?php
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
?>
<html>
<head>
<?php
//se define la clase juego la cual usaremos para llenar el select de opciones con un foreach
class Juego{
    private $nombre;
    private $valor;

    //le generamos un constructor que recibe un nombre y valor
    function __construct($nombre, $valor) {
        $this->nombre = $nombre;
        $this->valor = $valor;
    }

    //se agregan los getter
    function get_nombre(){
        return $this->nombre;
    }
    function get_valor(){
        return $this->valor;
    }
    //no se meten setters por que no se usan
}
//se instancían 3 objetos de Juego y despues se meten en un arreglo para usarlo después en el foreach
$juego1 = new Juego("Ruleta", "ruleta");
$juego2 = new Juego("Black Jack", "blackjack");
$juego3 = new Juego("Sorteo", "sorteo");
$juegos[] = $juego1;
$juegos[] = $juego2;
$juegos[] = $juego3;

?>
</head>
<body>
    <form method="POST" action="casino.php"><br/><br/> <!--Se hace la redireccíon al archivo casino.php con un POST al darle submit  -->
        <center>Nombre: <input type="text" name="nombre"/><br/><br/>
        Edad: <select name="edad">
        <?php
                //se ocupa en for para agregar edades del 10 al 100, no es lo óptimo pero sirve para la tarea XD
                for($edad=10; $edad <=100; $edad++){
                    print "<option value=\"".$edad."\">".$edad."</option>";
                }
            ?>
        </select>
        <br/><br/>
        Selecciona el juego:
        <br/><br/>
        <select name="juego">
            <?php
                //se ocupa en foreach para recorrer el arreglo y llenar el select con los juegos que se agregaron arriba
                foreach($juegos as $juego){
                    print "<option value=\"".$juego->get_valor()."\">".$juego->get_nombre()."</option>";
                }
            ?>
        </select>
        <br/><br/>
        <input type="submit" value="Jugar"/></center>
    </form>
</body>
</html>