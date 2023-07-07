<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<?php

class Persona {
    protected $nombre;
    protected $fecha_nacimiento;
    protected $direccion;
    protected $sexo;
  
    public function __construct($nombre, $fecha_nacimiento, $direccion, $sexo) {
      $this->nombre = $nombre;
      $this->fecha_nacimiento = $fecha_nacimiento;
      $this->direccion = $direccion;
      $this->sexo = $sexo;
    }
  
    public function imprimirObjeto() {
      $html = '<header class="container">
          <div class="flex-container">
              <div class="item">
                  <img src="img/unju-logo.png" alt="">
              </div>
              <div id="argpro">
                  <img src="img/arg programa.png" alt="">
              </div>
          </div>
      </header>';
      
      $html .= "<h2>Datos de la Persona</h2>";
      $html .= "<p>Nombre: $this->nombre</p>";
      $html .= "<p>Fecha de Nacimiento: $this->fecha_nacimiento</p>";
      $html .= "<p>Dirección: $this->direccion</p>";
      $html .= "<p>Sexo: $this->sexo</p>";
      return $html;
  }
  
}

class Postulante extends Persona {
  private $puesto;

  public function __construct($nombre, $fecha_nacimiento, $direccion, $sexo, $disponibilidad, $puesto) {
    parent::__construct($nombre, $fecha_nacimiento, $direccion, $sexo);
    $this->puesto = $puesto;
  }

  public function calcularEdad() {
    $fecha_actual = new DateTime();
    $fecha_nacimiento = new DateTime($this->fecha_nacimiento);
    $diferencia = $fecha_actual->diff($fecha_nacimiento);
    return $diferencia->y;
  }

  public function getPuesto(){
    return $this->puesto;
  }
}

class Empleado extends Persona {
    protected $disponibilidad;
    protected $puesto;
    protected $fecha_ingreso;
  
    public function __construct($nombre, $fecha_nacimiento, $direccion, $sexo, $disponibilidad, $puesto, $fecha_ingreso) {
      parent::__construct($nombre, $fecha_nacimiento, $direccion, $sexo);
      $this->disponibilidad = $disponibilidad;
      $this->puesto = $puesto;
      $this->fecha_ingreso = $fecha_ingreso;
    }
  
    public function calcularAntiguedad() {
      $fecha_actual = new DateTime();
      $fecha_ingreso = new DateTime($this->fecha_ingreso);
      $diferencia = $fecha_actual->diff($fecha_ingreso);
      return $diferencia->y;
    }
  
    public static function mostrarPuestos() {
      $puestos = ['Informática', 'Contable', 'RRHH'];
      foreach ($puestos as $puesto) {
        echo $puesto . "<br>";
      }
    }
  
    public function imprimirObjeto() {
      $html = parent::imprimirObjeto();
      $html .= "<p>Disponibilidad: $this->disponibilidad</p>";
      $html .= "<p>Puesto: $this->puesto</p>";
      $html .= "<p>Antigüedad: " . $this->calcularAntiguedad() . " años</p>";
      return $html;
    }
}

class EmpleadoInformatico extends Empleado {
    private $cantidadAplicaciones;
    private $basico = 200000;
  
    public function __construct($nombre, $cantidadAplicaciones) {
      parent::__construct($nombre, null, null, null, null, null, null);
      $this->cantidadAplicaciones = $cantidadAplicaciones;
    }
  
    public function calcularSueldo() {
      if ($this->cantidadAplicaciones >= 1 && $this->cantidadAplicaciones <= 5) {
        $sueldo = $this->basico + 10000;
      } elseif ($this->cantidadAplicaciones >= 6) {
        $sueldo = $this->basico + 20000;
      } else {
        $sueldo = $this->basico;
      }
  
      return $sueldo;
    }
}

class EmpleadoRRHH extends Empleado {
    private $cantidadProyectos;
    private $basico = 300000;
  
    public function __construct($nombre, $cantidadProyectos) {
      parent::__construct($nombre, null, null, null, null, null, null);
      $this->cantidadProyectos = $cantidadProyectos;
    }
  
    public function calcularSueldo() {
      if ($this->cantidadProyectos >= 1 && $this->cantidadProyectos <= 5) {
        $sueldo = $this->basico + 20000;
      } elseif ($this->cantidadProyectos >= 6) {
        $sueldo = $this->basico + 30000;
      } else {
        $sueldo = $this->basico;
      }
  
      return $sueldo;
    }
}

class EmpleadoContable extends Empleado {
    private $cantidadExpedientes;
    private $basico = 100000;
  
    public function __construct($nombre, $cantidadExpedientes) {
      parent::__construct($nombre, null, null, null, null, null, null);
      $this->cantidadExpedientes = $cantidadExpedientes;
    }
  
    public function calcularSueldo() {
      if ($this->cantidadExpedientes >= 1 && $this->cantidadExpedientes <= 5) {
        $sueldo = $this->basico + 50000;
      } elseif ($this->cantidadExpedientes >= 6) {
        $sueldo = $this->basico + 80000;
      } else {
        $sueldo = $this->basico;
      }
  
      return $sueldo;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $direccion = $_POST['direccion'];
  $sexo = $_POST['sexo'];
  $disponibilidad = $_POST['disponibilidad'];
  $puesto = $_POST['clase'];
  

  // Verifica si es un empleado o un postulante
  if (!empty($fecha_ingreso)) {
    $fecha_ingreso = $_POST['ingreso'];
    // Es un empleado
    $empleado = new Empleado($nombre, $fecha_nacimiento, $direccion, $sexo, $disponibilidad, $puesto, $fecha_ingreso);

    // Imprime detalles del empleado
    echo "<div>";
    echo $empleado->imprimirObjeto();
    echo "</div>";
  } else {
    
    $postulante = new Postulante($nombre, $fecha_nacimiento, $direccion, $sexo, null, null, null);

    // Imprime detalles del postulante
    echo "<div>";
    echo "El postulante ". $nombre . "se inscribió en el puesto de " . $puesto . " y tiene: ". $postulante->calcularEdad() . " años";
    echo "<br> <br>";
    echo "<a href='postulante.php'>Volver</a>";
    echo "<br> <br>";
    echo "<a href='index.html'>Inicio</a>";     
    echo "</div>";
  }

  // Verifica si se ha enviado el formulario para el cálculo del sueldo
  if (isset($_POST['clase']) && isset($_POST['cantidad'])) {
    $clase = $_POST['clase'];
    $cantidad = $_POST['cantidad'];

    // Crea una instancia del empleado correspondiente según la clase seleccionada
    $empleado = null;
    switch (strtolower($clase)) {
      case 'informatica':
        $empleado = new EmpleadoInformatico($nombre, $cantidad);
        break;
      case 'rrhh':
        $empleado = new EmpleadoRRHH($nombre, $cantidad);
        break;
      case 'contable':
        $empleado = new EmpleadoContable($nombre, $cantidad);
        break;
      default:
        // Clase de empleado no válida
        echo "Clase de empleado no válida";
        exit;
    }

    // Calcula el sueldo
    $sueldo = $empleado->calcularSueldo();

    // Muestra el resultado
    echo "El sueldo del empleado es: " . $sueldo;
    echo "<br> <br>";
    echo "<a href='empleado.php'>Volver</a>";
    echo "<br> <br>";
    echo "<a href='index.html'>Inicio</a>";
  }
}
?>

</body>
</html>