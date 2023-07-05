<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form-container">
    <form action="./pages/empleados.php" method="POST" enctype="multipart/form-data">
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

            <label for="puesto">Puesto:</label>
            <select id="puesto" name="puesto" required>
                <option value="">--Seleccionar--</option>
                <option value="informatica">Informática</option>
                <option value="contable">Contable</option>
                <option value="rrhh">RRHH</option>
            </select><br><br>

            <label for="cv">Cargar CV:</label>
                <input type="file" id="cv" name="cv" accept=".pdf, .doc, .jpg" required><br><br>

                <input type="submit" value="Enviar">
        </div>
    </form>
</div>
</body>
</html>