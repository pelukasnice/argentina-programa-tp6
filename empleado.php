<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header class="container">
        <div class="flex-container">
            <div  class="item">
                <img src="img/unju-logo.png" alt="">
            </div>
            <div id="title">
                <h3>TP N°6 - Diego Olguin </h3>
            </div>
            <div id="argpro">
                <img src="img/arg programa.png" alt="">
            </div>
        </div>
    </header>

    <<div class="form-container">
    <div class="form-container">
    <form action="procesar_empleado.php" method="POST" enctype="multipart/form-data">
        <div class="contenedor-form">
            
            <label for="nombre">Nombre y Apellido:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required><br><br>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="">--Seleccionar--</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select><br><br>

            <label for="disponibilidad">Disponibilidad:</label>
            <select id="disponibilidad" name="disponibilidad" required>
                <option value="">--Seleccionar--</option>
                <option value="fulltime">Full Time</option>
                <option value="mediotiempo">Medio Tiempo</option>
            </select><br><br>

            <label for="clase">Puesto:</label>
            <select id="clase" name="clase" required>
                <option value="">--Seleccionar--</option>
                <option value="informatica">Informática</option>
                <option value="contable">Contable</option>
                <option value="rrhh">RRHH</option>
            </select><br><br>

            <label for="ingreso">Fecha de Ingreso:</label>
            <input type="date" id="ingreso" name="ingreso" required><br><br>
            
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required><br><br>
                
            <input class="enviar" type="submit" value="Enviar">
        </div>
    </form>
</div>

</div>


    
</div>
</body>
</html>
