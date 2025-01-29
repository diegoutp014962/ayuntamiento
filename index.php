<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ayuntamiento de Puebla</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('imagenes/img11.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.75); /* Fondo blanco semitransparente */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0);
            width: 100%;
            max-width: 400px;
            border-top: 5px solidrgb(102, 0, 0);
        }

        .overlay h2 {
            margin-bottom: 20px;
            color:rgb(0, 0, 0);
            font-size: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color:rgb(102, 0, 0);
            box-shadow: 0 0 5px rgba(102, 0, 0, 0.5);
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background-color:rgb(102, 0, 0);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color:rgb(179, 0, 0);
        }

        .error {
            color: #cc0000;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }

        .ayuntamiento-logo {
            display: block;
            margin: 0 auto 20px auto;
            width: 80px;
            height: auto;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
    <script>
        function validarFormulario() {
            const nombre = document.getElementById('nombre').value.trim();
            const acceso = document.getElementById('acceso').value.trim();

            // Validación de solo letras para el nombre
            const regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
            if (!regexLetras.test(nombre)) {
                alert("El nombre solo puede contener letras y espacios.");
                return false;
            }

            // Validación de solo números y longitud exacta de 6 dígitos para el acceso
            const regexNumeros = /^\d{6}$/;
            if (!regexNumeros.test(acceso)) {
                alert("El acceso debe ser un número de 6 dígitos.");
                return false;
            }

            return true; // Si pasa todas las validaciones
        }
    </script>
</head>
<body>
    <div class="overlay">
        <img src="imagenes/img1.jpg" alt="Escudo Puebla" class="ayuntamiento-logo">
        <h2>Inicio de Sesión</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = trim($_POST['nombre']);
            $acceso = trim($_POST['acceso']);

            // Redirigir a la página de bienvenida
            header("Location: bienvenida.php");
            exit();
        }
        ?>
        <form action="" method="POST" onsubmit="return validarFormulario()">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
            </div>
            <div class="form-group">
                <label for="acceso">Acceso:</label>
                <input type="text" id="acceso" name="acceso" placeholder="Ingresa tu clave de acceso" required>
            </div>
            <button type="submit" class="btn">Ingresar</button>
        </form>
        <footer>
            © 2025 Ayuntamiento de Puebla. Todos los derechos reservados.
        </footer>
    </div>
</body>
</html>
