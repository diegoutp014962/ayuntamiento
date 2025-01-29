<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Biblioteca Digital</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('imagenes/img11.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.85); /* Fondo blanco semitransparente */
            padding: 40px;
            border-radius: 12px;
            max-width: 700px;
            width: 90%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            font-size: 32px;
            color: #003366;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.8;
            color: #333;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #003366;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>¡Bienvenido a la Biblioteca Digital del Ayuntamiento de Puebla!</h1>
        <p>
            Este espacio está diseñado para fomentar la lectura y el aprendizaje entre la ciudadanía y los trabajadores del Ayuntamiento. 
            Con más de <strong>400 libros físicos</strong>, puedes acceder a una amplia variedad de contenidos, desde literatura clásica 
            hasta materiales educativos y culturales.
        </p>
        <p>
            Nuestro objetivo es promover el acceso al conocimiento y enriquecer la vida de nuestra comunidad. Explora los recursos disponibles 
            y descubre nuevas ideas y perspectivas.
        </p>
        <!-- Redirección a biblioteca.php -->
        <a href="biblioteca.php" class="btn">Explorar la Biblioteca</a>
    </div>
</body>
</html>
