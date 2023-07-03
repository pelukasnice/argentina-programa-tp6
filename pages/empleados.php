<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <title>Document</title>
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
  }
  
  class Postulante extends Persona {
    public function calcularEdad() {
      $fecha_actual = new DateTime();
      $fecha_nacimiento = new DateTime($this->fecha_nacimiento);
      $diferencia = $fecha_actual->diff($fecha_nacimiento);
      return $diferencia->y;
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
  
  // Crear un empleado informático con 10 aplicaciones
  $empleadoInformatico = new EmpleadoInformatico("Nombre del empleado", 10);
  
  // Calcular y mostrar el sueldo del empleado informático
  echo "Sueldo del empleado informático: $" . $empleadoInformatico->calcularSueldo();
  ?>
  
 
  
    
</body>
</html>