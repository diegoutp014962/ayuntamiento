<?php
// Página principal que redirige a visiitanos.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('imagenes/img11.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.81);
            padding: 20px;
            border-radius: 10px;
        }
        .container h1 {
            font-size: 36px;
        }
        .container p {
            font-size: 18px;
            margin: 20px 0;
        }
        .button {
            background-color: rgb(102, 0, 0);
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            display: inline-block;
        }
        .button:hover {
            background-color: rgb(102, 0, 0);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>¡Tu libro está listo para ser leído!</h1>
    <p>¡GENIAL! Gracias por elegir un libro, eso nutrirá tu conocimiento.</p>
    <p>Para poder leer el libro necesitas visitar el ayuntamiento de Puebla para hacer el trámite correspondiente.</p>
    <p>¡TE ESPERAMOS!.</p>
    <a href="visiitanos.php" class="button">Visítanos</a>
</div>

</body>
</html>
