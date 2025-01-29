<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('imagenes/img11.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            color: #222;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0);
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: rgb(255, 254, 254);
        }

        .search-box {
            position: relative;
        }

        .search-box input[type="text"] {
            padding: 8px 12px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
            font-size: 14px;
        }

        .search-box input[type="text"]:focus {
            border-color: rgb(102, 0, 0);
        }

        .catalogo-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0);
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0);
        }

        .catalogo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .libro {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: auto;
        }

        .libro:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .libro img {
            max-width: 150px;
            height: auto;
            margin-bottom: 5px;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .libro h3 {
            flex-grow: 1;
            color: rgb(0, 0, 0);
            font-size: 16px;
            margin-bottom: 5px;
        }

        .boton-reservar {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: auto;
        }

        .boton-reservar:hover {
            background-color: #0056b3;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Biblioteca Digital</h1>
    <div class="search-box">
        <input type="text" id="search" placeholder="Buscar libros..." onkeyup="buscarLibros()">
    </div>
</div>
<div class="catalogo-container">
    <div class="catalogo-grid" id="catalogo">
        <?php
        // Lista de libros con imágenes y títulos
        $libros = [
            ["imagen" => "imagenes/A La Luz Del Relampago.jpg", "titulo" => "A La Luz Del Relampago"],
            ["imagen" => "imagenes/Antologia Poetica.jpg", "titulo" => "Antologia Poetica"],
            ["imagen" => "imagenes/Atrevidas, Mujeres que han osado.jpg", "titulo" => "Atrevidas Mujeres que han osado"],
            ["imagen" => "imagenes/Ausencia.jpg", "titulo" => "Ausencia"],
            ["imagen" => "imagenes/Con Tinta Sangre.jpg", "titulo" => "Con Tinta Sangre"],
            ["imagen" => "imagenes/Detrás De Billy Sunday.jpg", "titulo" => "Detrás De Billy Sunday"],
            ["imagen" => "imagenes/El Amor En Los Tiempos De Internet.jpg", "titulo" => "El Amor En Los Tiempos De Internet"],
            ["imagen" => "imagenes/EL Barcarola.jpg", "titulo" => "EL Barcarola"],
            ["imagen" => "imagenes/El Camino Del Principio.jpg", "titulo" => "El Camino Del Principio"],
            ["imagen" => "imagenes/El Vaso de Leche.jpg", "titulo" => "El Vaso de Leche"],
            ["imagen" => "imagenes/EL Zoologico.jpg", "titulo" => "EL Zoologico"],
            ["imagen" => "imagenes/Fusilados.jpg", "titulo" => "Fusilados"],
            ["imagen" => "imagenes/Hibakusha Testimonio De Yasuaki Yamashita.jpg", "titulo" => "Hibakusha Testimonio De Yasuaki Yamashita"],
            ["imagen" => "imagenes/Iluikak Nemiti.jpg", "titulo" => "Iluikak Nemiti"],
            ["imagen" => "imagenes/La Cruzada De Los Niños.jpg", "titulo" => "La Cruzada De Los Niños"],
            ["imagen" => "imagenes/La Huelga De Nueva Rosita.jpg", "titulo" => "La Huelga De Nueva Rosita"],
            ["imagen" => "imagenes/La primavera magisterial.jpg", "titulo" => "La Primavera Magisterial"],
            ["imagen" => "imagenes/La Sensibilidad Personal y La Valentia Comunitaria.jpg", "titulo" => "La Sensibilidad Personal y La Valentia Comunitaria"],
            ["imagen" => "imagenes/La Trampa.jpg", "titulo" => "La Trampa"],
            ["imagen" => "imagenes/Los Negros.jpg", "titulo" => "Los Negros"],
            ["imagen" => "imagenes/MOMO.jpg", "titulo" => "MOMO"],
            ["imagen" => "imagenes/Nueve Noches Con Violeta Del Rio.jpg", "titulo" => "Nueve Noches Con Violeta Del Rio"],
            ["imagen" => "imagenes/Obras Tomo I Prosa dispersa.jpg", "titulo" => "Obras Tomo I Prosa dispersa"],
            ["imagen" => "imagenes/Primo Tapia Romance y Vida.jpg", "titulo" => "Primo Tapia Romance y Vida"],
            ["imagen" => "imagenes/Relatos Esenciales.jpg", "titulo" => "Relatos Esenciales"],
            ["imagen" => "imagenes/Subasta.jpg", "titulo" => "Subasta"],
            ["imagen" => "imagenes/Un Rescatista En La Corte de Felipe II.jpg", "titulo" => "Un Rescatista En La Corte de Felipe II"],
            ["imagen" => "imagenes/Mitos, leyendas, Cuentos, Fábulas, Apólogos y Parábolas.jpg", "titulo" => "Mitos, leyendas, Cuentos, Fábulas, Apólogos y Parábolas"],
            ["imagen" => "imagenes/AQUILES SERDÁN ALATRISTE, SACRIFICIO O ASESINATO.jpg", "titulo" => "AQUILES SERDÁN ALATRISTE, SACRIFICIO O ASESINATO"],
            ["imagen" => "imagenes/Rehabilitacion Urbana Sostenible.jpg", "titulo" => "Rehabilitacion Urbana Sostenible"],
            ["imagen" => "imagenes/El retorno de la Marigalante.jpg", "titulo" => "El retorno de la Marigalante"],
            ["imagen" => "imagenes/Introducción a la Poesía De José Recek Saade.jpg", "titulo" => "Introducción a la Poesía De José Recek Saade"],
            ["imagen" => "imagenes/De la Cirugía a la Medicina Quirúrgica.jpg", "titulo" => "De la Cirugía a la Medicina Quirúrgica"],
            ["imagen" => "imagenes/La intervención Francesa en Mexicó.jpg", "titulo" => "La intervención Francesa en Mexicó"],
            ["imagen" => "imagenes/Repensar a la Universidad, Propuestas para eliminar las inequidades.jpg", "titulo" => "Repensar a la Universidad, Propuestas para eliminar las inequidades"],
            ["imagen" => "imagenes/La disputa por el territorio Movimientos sociales y poder Político.jpg", "titulo" => "La disputa por el territorio Movimientos sociales y poder Político"],
            ["imagen" => "imagenes/La Mujer Mas Hermosa Del Renacimiento.jpg", "titulo" => "La Mujer Mas Hermosa Del Renacimiento"],
            ["imagen" => "imagenes/Perspectivas De Los Modelos Alternativos En América Latina.jpg", "titulo" => "Perspectivas De Los Modelos Alternativos En América Latina"],
            ["imagen" => "imagenes/El Amor En Los Tiempos De Internet.jpg", "titulo" => "El Amor En Los Tiempos De Internet"], 
            ["imagen" => "imagenes/Aceldama.jpg", "titulo" => "Aceldama"],
            ["imagen" => "imagenes/Frente al Tiempo.jpg", "titulo" => "Frente al Tiempo"],
            ["imagen" => "imagenes/La Nueva Gestión Pública.jpg", "titulo" => "La Nueva Gestión Pública"],
            ["imagen" => "imagenes/La Semilla Del Rock En Puebla.jpg", "titulo" => "La Semilla Del Rock En Puebla"],
            ["imagen" => "imagenes/Dengue.jpg", "titulo" => "Dengue"],
            ["imagen" => "imagenes/Gritos Desde El Silencio.jpg", "titulo" => "Gritos Desde El Silencio"],
            ["imagen" => "imagenes/Ayer y El Hoy Del Deporte En La BUAP.jpg", "titulo" => "Ayer y El Hoy Del Deporte En La BUAP"],
            ["imagen" => "imagenes/La Cognición en los sistemas biologicós.jpg", "titulo" => "La Cognición en los sistemas biologicós"],
            ["imagen" => "imagenes/Revolución y Tifo en ciudad de Puebla.jpg", "titulo" => "Revolución y Tifo en ciudad de Puebla"], 
            ["imagen" => "imagenes/De la Teoría a la Poética de la traducción.jpg", "titulo" => "De la Teoría a la Poética de la traducción"],
            ["imagen" => "imagenes/Aceldama.jpg", "titulo" => "Aceldama"],          
            ["imagen" => "imagenes/Si vienes te cuento.jpg", "titulo" => "Si vienes te cuento"],
            ["imagen" => "imagenes/Nacimiento y consolidación de centralidades urbanas.jpg", "titulo" => "Nacimiento y consolidación de centralidades urbanas"],
            ["imagen" => "imagenes/La campana en el tiempo.jpg", "titulo" => "La campana en el tiempo"],
            ["imagen" => "imagenes/Voces e Imágenes de Periodismo en Puebla.jpg", "titulo" => "Voces e Imágenes de Periodismo en Puebla"],
            ["imagen" => "imagenes/Perfiles Habitacionales y Condiciones Ambientales.jpg", "titulo" => "Perfiles Habitacionales y Condiciones Ambientales"],
            ["imagen" => "imagenes/De cinco a siete.jpg", "titulo" => "De cinco a siete"],
            ["imagen" => "imagenes/Una salud en caso de la influencia.jpg", "titulo" => "Una salud en caso de la influencia"],
            ["imagen" => "imagenes/El 68 en Puebla y su Universidad.jpg", "titulo" => "El 68 en Puebla y su Universidad"],
            ["imagen" => "imagenes/Vía Láctea.jpg", "titulo" => "Vía Láctea"],
            ["imagen" => "imagenes/Con todas sus letras.jpg", "titulo" => "Con todas sus letras"],
            ["imagen" => "imagenes/Modelos de gestión de la calidad.jpg", "titulo" => "Modelos de gestión de la calidad"],
            ["imagen" => "imagenes/Huellas en el tiempo.jpg", "titulo" => "Huellas en el tiempo"],
            ["imagen" => "imagenes/Sin ti.jpg", "titulo" => "Sin ti"],
            ["imagen" => "imagenes/Reyes de Puebla.jpg", "titulo" => "Reyes de Puebla"],
            ["imagen" => "imagenes/El futuro fue peor.jpg", "titulo" => "El futuro fue peor"],
            ["imagen" => "imagenes/Libro de cuentos ilustrados.jpg", "titulo" => "Libro de cuentos ilustrados"],
            ["imagen" => "imagenes/ANTROPOLOGÍA.jpg", "titulo" => "ANTROPOLOGÍA"],
            ["imagen" => "imagenes/EL ARCÓN DE LA MEMORIA.jpg", "titulo" => "EL ARCÓN DE LA MEMORIA"],
            ["imagen" => "imagenes/El hilo que remienda.jpg", "titulo" => "El hilo que remienda"],
            ["imagen" => "imagenes/UNA CASA VACÍA.jpg", "titulo" => "UNA CASA VACÍA"],
            ["imagen" => "imagenes/LA SANGRE DE LAS PLANTAS.jpg", "titulo" => "LA SANGRE DE LAS PLANTAS"],
            ["imagen" => "imagenes/no volveré a tocarte.jpg", "titulo" => "no volveré a tocarte"],
            ["imagen" => "imagenes/CONSTELACIÓN DE HISTORIAS.jpg", "titulo" => "CONSTELACIÓN DE HISTORIAS"],
            ["imagen" => "imagenes/VOCES DE RESISTENCIA, LA NOVELA MEXICANA DEL 68.jpg", "titulo" => "VOCES DE RESISTENCIA, LA NOVELA MEXICANA DEL 68"],
            ["imagen" => "imagenes/PUEBLA Y SUS DEMONIOS.jpg", "titulo" => "PUEBLA Y SUS DEMONIOS"],
            ["imagen" => "imagenes/MISTERIOSA CIUDEATH.jpg", "titulo" => "MISTERIOSA CIUDEATH"],
            ["imagen" => "imagenes/PERDÓN, ¡SOY MALO!.jpg", "titulo" => "PERDÓN, ¡SOY MALO!"],
            ["imagen" => "imagenes/De lúdicas sombras.jpg", "titulo" => "De lúdicas sombras"],
            ["imagen" => "imagenes/El Grupo Cauce.jpg", "titulo" => "El Grupo Cauce"],
            ["imagen" => "imagenes/¡Nocauts! Microrrelato internacional de boxeo.jpg", "titulo" => "¡Nocauts! Microrrelato internacional de boxeo"], 
            ["imagen" => "imagenes/FUNDACIÓN ESTELAR EJERCICIOS DE TRANSFERENCIA EN LA LUCHA LIBRE.jpg", "titulo" => "FUNDACIÓN ESTELAR EJERCICIOS DE TRANSFERENCIA EN LA LUCHA LIBRE"],
            ["imagen" => "imagenes/LA SUBASTA DEL CONO.jpg", "titulo" => "LA SUBASTA DEL CONO"],
            ["imagen" => "imagenes/LA HABITACIÓN AMARILLA.jpg", "titulo" => "LA HABITACIÓN AMARILLA"],
            ["imagen" => "imagenes/La jaula invisible.jpg", "titulo" => "La jaula invisible"],
            ["imagen" => "imagenes/Antología.jpg", "titulo" => "Antología"],
            ["imagen" => "imagenes/El mito de las sectas.jpg", "titulo" => "El mito de las sectas"],
            ["imagen" => "imagenes/Luna que se quiebra.jpg", "titulo" => "Luna que se quiebra"],
            ["imagen" => "imagenes/YO, EL MALDITO.jpg", "titulo" => "YO, EL MALDITO"],
            ["imagen" => "imagenes/ÉXODO A NÍNGUN LUGAR.jpg", "titulo" => "ÉXODO A NÍNGUN LUGAR"],
            ["imagen" => "imagenes/EL AUTOR DE LA RELACIÓN QUE VERÍFICA DEL CURPUS DE LA CUIDAD DE PUEBLA.jpg", "titulo" => "EL AUTOR DE LA RELACIÓN QUE VERÍFICA DEL CURPUS DE LA CUIDAD DE PUEBLA"], 
            ["imagen" => "imagenes/Todas las noches escupo que te amo.jpg", "titulo" => "Todas las noches escupo que te amo"],
            ["imagen" => "imagenes/Raíz de luz.jpg", "titulo" => "Raíz de luz"],
            ["imagen" => "imagenes/La desnudes de la existencia y el sentido que la abriga.jpg", "titulo" => "La desnudes de la existencia y el sentido que la abriga"],
            ["imagen" => "imagenes/Consecuencias en México, Palabra y Género.jpg", "titulo" => "Consecuencias en México, Palabra y Género"],
            ["imagen" => "imagenes/Honra tu límite.jpg", "titulo" => "Honra tu límite"],
            ["imagen" => "imagenes/Transformándonos desde la escuela.jpg", "titulo" => "Transformándonos desde la escuela"],
            ["imagen" => "imagenes/Tantadel y la cancion de odette.jpg", "titulo" => "Tantadel y la cancion de odette"],
            ["imagen" => "imagenes/El desamparo de la bestia.jpg", "titulo" => "El desamparo de la bestia"],
            ["imagen" => "imagenes/GOLPE CIEGO.jpg", "titulo" => "GOLPE CIEGO"],
            ["imagen" => "imagenes/CIC, El suplantador.jpg", "titulo" => "CIC, El suplantador"],
            ["imagen" => "imagenes/La psicología social aplicada.jpg", "titulo" => "La psicología social aplicada"],
            ["imagen" => "imagenes/PUEBLA EN EL CENTENARIO DE LA REVOLUCIÓN.jpg", "titulo" => "PUEBLA EN EL CENTENARIO DE LA REVOLUCIÓN"],
            ["imagen" => "imagenes/Dithelo Tumba.jpg", "titulo" => "Dithelo Tumba"],
            ["imagen" => "imagenes/Bazar de la serpiente.jpg", "titulo" => "Bazar de la serpiente"],
            ["imagen" => "imagenes/Verde fuego de espíritus.jpg", "titulo" => "Verde fuego de espíritus"],
            ["imagen" => "imagenes/Viejo vals de casa.jpg", "titulo" => "Viejo vals de casa"],
            ["imagen" => "imagenes/Segundos extraordinarios.jpg", "titulo" => "Segundos extraordinarios"],
            ["imagen" => "imagenes/Escribo que sueño, sueño que escribo.jpg", "titulo" => "Escribo que sueño, sueño que escribo"],
            ["imagen" => "imagenes/Descendencia Imaginaria.jpg", "titulo" => "Descendencia Imaginaria"],
            ["imagen" => "imagenes/Fonología para niños.jpg", "titulo" => "Fonología para niños"],
            ["imagen" => "imagenes/Laberintos.jpg", "titulo" => "Laberintos"],
            ["imagen" => "imagenes/Historia de la medicina en Puebla durante la intervención francesa.jpg", "titulo" => "Historia de la medicina en Puebla durante la intervención francesa"],
            ["imagen" => "imagenes/La cultura del bien pensar.jpg", "titulo" => "La cultura del bien pensar"],
            ["imagen" => "imagenes/La escuela de ciencias económico administrativas, contaduría pública.jpg", "titulo" => "La escuela de ciencias económico administrativas, contaduría pública"],
            ["imagen" => "imagenes/LIBRANOS DEL FUEGO.jpg", "titulo" => "LIBRANOS DEL FUEGO"],
            ["imagen" => "imagenes/Entre la fé y el poder.jpg", "titulo" => "Entre la fé y el poder"],
            ["imagen" => "imagenes/Influencia de la poesía de la canción en México.jpg", "titulo" => "Influencia de la poesía de la canción en México"],
            ["imagen" => "imagenes/La terapia de la inperfección en empresas.jpg", "titulo" => "La terapia de la inperfección en empresas"],
            ["imagen" => "imagenes/Un héroe extraviado.jpg", "titulo" => "Un héroe extraviado"],
            ["imagen" => "imagenes/Puebla señorial.jpg", "titulo" => "Puebla señorial"], 
            ["imagen" => "imagenes/Coctel.jpg", "titulo" => "Coctel"],
            ["imagen" => "imagenes/El veneciano.jpg", "titulo" => "El veneciano"],
            ["imagen" => "imagenes/Comunicación y tecnología.jpg", "titulo" => "Comunicación y tecnología"],
            ["imagen" => "imagenes/Meditaciones del rescondo.jpg", "titulo" => "Meditaciones del rescondo"],
            ["imagen" => "imagenes/Lagunas Mentales.jpg", "titulo" => "Lagunas Mentales"],
            ["imagen" => "imagenes/Ideas para la vida.jpg", "titulo" => "Ideas para la vida"],
            ["imagen" => "imagenes/Ana De Zayas.jpg", "titulo" => "Ana De Zayas"],
            ["imagen" => "imagenes/Víctimas Voluntarias.jpg", "titulo" => "Víctimas Voluntarias"],
            ["imagen" => "imagenes/El mundo invicible.jpg", "titulo" => "El mundo invicible"],
            ["imagen" => "imagenes/La transformacion y otros relatos.jpg", "titulo" => "La transformacion y otros relatos"], 
            ["imagen" => "imagenes/Mátame suavemente.jpg", "titulo" => "Mátame suavemente"],
            ["imagen" => "imagenes/LA ZANAHORIA MAS GRANDE.jpg", "titulo" => "LA ZANAHORIA MAS GRANDE"],
            ["imagen" => "imagenes/¡HORDA! Y OTROS RELATOS.jpg", "titulo" => "¡HORDA! Y OTROS RELATOS"],
            ["imagen" => "imagenes/Allaclet el niño estrella.jpg", "titulo" => "Allaclet el niño estrella"],
            ["imagen" => "imagenes/LOS SÓTANOS DE BABEL.jpg", "titulo" => "LOS SÓTANOS DE BABEL"],
            ["imagen" => "imagenes/verano del Catorce.jpg", "titulo" => "verano del Catorce"],
            ["imagen" => "imagenes/Cañita Cuahuzayoly.jpg", "titulo" => "Cañita Cuahuzayoly"],
            ["imagen" => "imagenes/PUEBLA DIRECTO.jpg", "titulo" => "PUEBLA DIRECTO"],
            ["imagen" => "imagenes/EL ÚLTIMO APAGA LA LUZ.jpg", "titulo" => "EL ÚLTIMO APAGA LA LUZ"],
            ["imagen" => "imagenes/La parábola del hijo pródigo.jpg", "titulo" => "La parábola del hijo pródigo"],
            ["imagen" => "imagenes/Beata hechicera.jpg", "titulo" => "Beata hechicera"],
            ["imagen" => "imagenes/Estructura y formacion Profecional.jpg", "titulo" => "Estructura y formacion Profecional"],
            ["imagen" => "imagenes/El ilustre bastardo.jpg", "titulo" => "El ilustre bastardo"],
            ["imagen" => "imagenes/EL REGISTRO PALEOBIOLOGICO DEL ESTADO DE PUEBLA.jpg", "titulo" => "EL REGISTRO PALEOBIOLOGICO DEL ESTADO DE PUEBLA"],
            ["imagen" => "imagenes/Bajo el peso de nuestropropio fuego.jpg", "titulo" => "Bajo el peso de nuestropropio fuego"],
            ["imagen" => "imagenes/FUIMOS GUERREROS.jpg", "titulo" => "FUIMOS GUERREROS"],
            ["imagen" => "imagenes/VUELEN, CONEJOS.jpg", "titulo" => "VUELEN, CONEJOS"],
            ["imagen" => "imagenes/antología de cuentos.jpg", "titulo" => "antología de cuentos"],
            ["imagen" => "imagenes/PESCADORES.jpg", "titulo" => "PESCADORES"],
            ["imagen" => "imagenes/El Camino Del Principio.jpg", "titulo" => "El Camino Del Principio"], 
            ["imagen" => "imagenes/Pasajeros sin huellas.jpg", "titulo" => "Pasajeros sin huellas"],
            ["imagen" => "imagenes/Breveridades y breverismos.jpg", "titulo" => "Breveridades y breverismos"],
            ["imagen" => "imagenes/PEQUEÑAS HISTORIAS DESDE EL AULA.jpg", "titulo" => "PEQUEÑAS HISTORIAS DESDE EL AULA"],
            ["imagen" => "imagenes/Revisión del Discurso Revolucionario.jpg", "titulo" => "Revisión del Discurso Revolucionario"],
            ["imagen" => "imagenes/LA CUERDA.jpg", "titulo" => "LA CUERDA"],
            ["imagen" => "imagenes/Gente del Pueblo.jpg", "titulo" => "Gente del Pueblo"],
            ["imagen" => "imagenes/La ciudad de la peste blanca.jpg", "titulo" => "La ciudad de la peste blanca"],
            ["imagen" => "imagenes/América Latina.jpg", "titulo" => "América Latina"],
            ["imagen" => "imagenes/La fatiga de ser humano.jpg", "titulo" => "La fatiga de ser humano"],
            ["imagen" => "imagenes/Esta carta está en tus labios.jpg", "titulo" => "Esta carta está en tus labios"],
            ["imagen" => "imagenes/Déjame acariciar tu rostro.jpg", "titulo" => "Déjame acariciar tu rostro"],
            ["imagen" => "imagenes/Liberate de la perfección.jpg", "titulo" => "Liberate de la perfección"],
            ["imagen" => "imagenes/La invención de lo sobrenatural.jpg", "titulo" => "La invención de lo sobrenatural"],
            ["imagen" => "imagenes/Voces Poblanas, Antología Poetítica.jpg", "titulo" => "Voces Poblanas, Antología Poetítica"],
            ["imagen" => "imagenes/El halcón blanco.jpg", "titulo" => "El halcón blanco"],
            ["imagen" => "imagenes/Voz que ve.jpg", "titulo" => "Voz que ve"],
            ["imagen" => "imagenes/Bichos, Bichos y ¡Salud Para Todos!.jpg", "titulo" => "Bichos, Bichos y ¡Salud Para Todos!"],
            ["imagen" => "imagenes/Gramática Latina.jpg", "titulo" => "Gramática Latina"],
            ["imagen" => "imagenes/Destino Criminal.jpg", "titulo" => "Destino Criminal"],
            ["imagen" => "imagenes/Chiautla y Puebla en mi vida.jpg", "titulo" => "Chiautla y Puebla en mi vida"], 
            ["imagen" => "imagenes/Caciques De Antaño.jpg", "titulo" => "Caciques De Antaño"],
            ["imagen" => "imagenes/ENTRE LA GLORIA Y EL INFIERNO.jpg", "titulo" => "ENTRE LA GLORIA Y EL INFIERNO"],
            ["imagen" => "imagenes/DESENLAZANDO SIGNOS.jpg", "titulo" => "DESENLAZANDO SIGNOS"],
            ["imagen" => "imagenes/SONES DE MARIMBAS Y GUIROS.jpg", "titulo" => "SONES DE MARIMBAS Y GUIROS"],
            ["imagen" => "imagenes/CHAMUCO.jpg", "titulo" => "CHAMUCO"],
            ["imagen" => "imagenes/Blanco Roto.jpg", "titulo" => "Blanco Roto"],
            ["imagen" => "imagenes/Lo noble del Noble.jpg", "titulo" => "Lo noble del Noble"],
            ["imagen" => "imagenes/SALUD INFANTIL.jpg", "titulo" => "SALUD INFANTIL"],
            ["imagen" => "imagenes/LA COCINA EN PUEBLA.jpg", "titulo" => "LA COCINA EN PUEBLA"],
            ["imagen" => "imagenes/BIBLIOTECA CENTRAL UNIVERSITARIA.jpg", "titulo" => "BIBLIOTECA CENTRAL UNIVERSITARIA"], 
            ["imagen" => "imagenes/ESTADIO UNIVERSITARIO BUAP.jpg", "titulo" => "ESTADIO UNIVERSITARIO BUAP"],
            ["imagen" => "imagenes/Fraselia.jpg", "titulo" => "Fraselia"],
            ["imagen" => "imagenes/CONTRA ENALENACIÓN.jpg", "titulo" => "CONTRA ENALENACIÓN"],
            ["imagen" => "imagenes/Beneficiado tradicional de Vainilla.jpg", "titulo" => "Beneficiado tradicional de Vainilla"],
            ["imagen" => "imagenes/N.N..jpg", "titulo" => "N.N."],
            ["imagen" => "imagenes/CUAUTÉMOC NEGADO.jpg", "titulo" => "CUAUTÉMOC NEGADO"],
            ["imagen" => "imagenes/Análisis de la vialidad futura de las pensiones provisionales.jpg", "titulo" => "Análisis de la vialidad futura de las pensiones provisionales"],
            ["imagen" => "imagenes/EL MARTILLO QUE NO QUERÍA GOLPEAR MÁS.jpg", "titulo" => "EL MARTILLO QUE NO QUERÍA GOLPEAR MÁS"],
            ["imagen" => "imagenes/DISEÑANDO UTOPÍAS.jpg", "titulo" => "DISEÑANDO UTOPÍAS"],
            ["imagen" => "imagenes/SEGUNDA TEORÍA.jpg", "titulo" => "SEGUNDA TEORÍA"], 
            ["imagen" => "imagenes/LABOR OMNIA VINCIT.jpg", "titulo" => "LABOR OMNIA VINCIT"],
            ["imagen" => "imagenes/La informacion del consenso por la independencia.jpg", "titulo" => "La información del consenso por la independencia"],
            ["imagen" => "imagenes/En Puebla médicos, ciencia, y academia.jpg", "titulo" => "En Puebla médicos, ciencia, y academia"],
            ["imagen" => "imagenes/Testimonios Heroicos de la Puebla de Zaragoza.jpg", "titulo" => "Testimonios Heroicos de la Puebla de Zaragoza"],
            ["imagen" => "imagenes/FACULTAD DE LA INGENIERÍA DE LA BUAP.jpg", "titulo" => "FACULTAD DE LA INGENIERÍA DE LA BUAP"],
            ["imagen" => "imagenes/RECONFIGURACIONES SOCIOTERRITORIALES.jpg", "titulo" => "RECONFIGURACIONES SOCIOTERRITORIALES"],
            ["imagen" => "imagenes/Testimonios y documentos históricos del sitio francés de Puebla en 1863.jpg", "titulo" => "Testimonios y documentos históricos del sitio francés de Puebla en 1863"],
            ["imagen" => "imagenes/HISTORIA DE LA CIENCIA DURANTE LA EDAD MEDIA.jpg", "titulo" => "HISTORIA DE LA CIENCIA DURANTE LA EDAD MEDIA"],
            ["imagen" => "imagenes/ÍTEM.jpg", "titulo" => "ÍTEM"],
            ["imagen" => "imagenes/Súbditos, ¡a las alarmas!.jpg", "titulo" => "Súbditos, ¡a las alarmas!"],
            ["imagen" => "imagenes/GILBERTO BOSQUES EN CUBA.jpg", "titulo" => "GILBERTO BOSQUES EN CUBA"],
            ["imagen" => "imagenes/SER NIÑA ESTÁ BIEN.jpg", "titulo" => "SER NIÑA ESTÁ BIEN"],
            ["imagen" => "imagenes/El sindicalismo oficial en Puebla.jpg", "titulo" => "El sindicalismo oficial en Puebla"],
            ["imagen" => "imagenes/Educación ambiental en universidades de la región Puebla-Tlaxcala.jpg", "titulo" => "Educación ambiental en universidades de la región Puebla-Tlaxcala"],
            ["imagen" => "imagenes/DON CUCO EL GUAPO.jpg", "titulo" => "DON CUCO EL GUAPO"],
            ["imagen" => "imagenes/Quién es el adolescente.jpg", "titulo" => "Quién es el adolescente"],
            ["imagen" => "imagenes/Métodos cuantitativos aplicados.jpg", "titulo" => "Métodos cuantitativos aplicados"],
            ["imagen" => "imagenes/Poética de la imagen.jpg", "titulo" => "Poética de la imagen"],
            ["imagen" => "imagenes/etnicidad y migración internacional.jpg", "titulo" => "etnicidad y migración internacional"],
            ["imagen" => "imagenes/MONTERREY Y PUEBLA.jpg", "titulo" => "MONTERREY Y PUEBLA"],
            ["imagen" => "imagenes/REFLEJOS COTIDIANOS.jpg", "titulo" => "REFLEJOS COTIDIANOS"],
            ["imagen" => "imagenes/BUAP reflexiones y futuro.jpg", "titulo" => "BUAP reflexiones y futuro"],
            ["imagen" => "imagenes/del enfermo imaginario al médico a palos.jpg", "titulo" => "del enfermo imaginario al médico a palos"],
            ["imagen" => "imagenes/El huehencho.jpg", "titulo" => "El huehencho"],
            ["imagen" => "imagenes/Museo de nimiedades.jpg", "titulo" => "Museo de nimiedades"],
            ["imagen" => "imagenes/Cortocircuito.jpg", "titulo" => "Cortocircuito"],
            ["imagen" => "imagenes/Radio BUAP.jpg", "titulo" => "Radio BUAP"],
            ["imagen" => "imagenes/SOBRE EL OFICIO DE ESCRITOR.jpg", "titulo" => "SOBRE EL OFICIO DE ESCRITOR"],
            ["imagen" => "imagenes/Formación de directivos empresariales.jpg", "titulo" => "Formación de directivos empresariales"],
            ["imagen" => "imagenes/El padre benigno.jpg", "titulo" => "El padre benigno"],
            ["imagen" => "imagenes/De qué silencio vienes.jpg", "titulo" => "De qué silencio vienes"],
            ["imagen" => "imagenes/Manchas de tinta.jpg", "titulo" => "Manchas de tinta"],
            ["imagen" => "imagenes/Las aves de la BUAP.jpg", "titulo" => "Las aves de la BUAP"],
            ["imagen" => "imagenes/Nueve ensayos bor gescos y un relato.jpg", "titulo" => "Nueve ensayos borgescos y un relato"],
            ["imagen" => "imagenes/Puebla mía.jpg", "titulo" => "Puebla mía"],
            ["imagen" => "imagenes/Lugares Ajenos.jpg", "titulo" => "Lugares Ajenos"],
            ["imagen" => "imagenes/Puebla Crónica Gráfica.jpg", "titulo" => "Puebla Crónica Gráfica"],
            ["imagen" => "imagenes/Brevediario.jpg", "titulo" => "Brevediario"],
            ["imagen" => "imagenes/Modelo Midas.jpg", "titulo" => "Modelo Midas"],
            ["imagen" => "imagenes/El desarrollo urbano sustentable en la ciudad de montreal.jpg", "titulo" => "El desarrollo urbano sustentable en la ciudad de Montreal"],
            ["imagen" => "imagenes/Puebla, calle 11 sur de borde urbano a eje de centralidad.jpg", "titulo" => "Puebla, calle 11 sur de borde urbano a eje de centralidad"],
            ["imagen" => "imagenes/Introducción a los metodos numéricos.jpg", "titulo" => "Introducción a los métodos numéricos"],
            ["imagen" => "imagenes/Su majestad el taco arabe.jpg", "titulo" => "Su majestad el taco árabe"],
            ["imagen" => "imagenes/Convento de santa maría magdalena.jpg", "titulo" => "Convento de Santa María Magdalena"],
            ["imagen" => "imagenes/Alotropías en la trinchera evanescente.jpg", "titulo" => "Alotropías en la trinchera evanescente"],
            ["imagen" => "imagenes/Juventud, trabajo y narcotráfico.jpg", "titulo" => "Juventud, trabajo y narcotráfico"],
            ["imagen" => "imagenes/Desarrollo de Infraestructura Universitaria.jpg", "titulo" => "Desarrollo de Infraestructura Universitaria"],
            ["imagen" => "imagenes/Enunciación y narración fílmica.jpg", "titulo" => "Enunciación y narración fílmica"],
            ["imagen" => "imagenes/Un Rescatista En La Corte de Felipe II.jpg", "titulo" => "Un Rescatista En La Corte de Felipe II"],
            ["imagen" => "imagenes/Tomás y la luna.jpg", "titulo" => "Tomás y la luna"], 
            ["imagen" => "imagenes/BIODIESEL.jpg", "titulo" => "BIODIESEL"],
            ["imagen" => "imagenes/CUENTA CONMIGO.jpg", "titulo" => "CUENTA CONMIGO"],
            ["imagen" => "imagenes/La niña del chirimoyo.jpg", "titulo" => "La niña del chirimoyo"],
            ["imagen" => "imagenes/Bichos y algo más.jpg", "titulo" => "Bichos y algo más"],
            ["imagen" => "imagenes/Las mujeres y la cultura.jpg", "titulo" => "Las mujeres y la cultura"],
            ["imagen" => "imagenes/Reflexiones sobre guionismo.jpg", "titulo" => "Reflexiones sobre guionismo"],
            ["imagen" => "imagenes/Historia Verdadera de la Conquista de la Nueva España.jpg", "titulo" => "Historia Verdadera de la Conquista de la Nueva España"],
            ["imagen" => "imagenes/TZINACAPAN Y MALINTZIN.jpg", "titulo" => "TZINACAPAN Y MALINTZIN"],
        ];
        foreach ($libros as $libro) {
            echo '<div class="libro">';
            echo '<img src="' . $libro['imagen'] . '" alt="' . $libro['titulo'] . '">';
            echo '<h3>' . $libro['titulo'] . '</h3>';
            echo '<a href="reservar.php?titulo=' . urlencode($libro['titulo']) . '" class="boton-reservar">Reservar Libro</a>';
            echo '</div>';
        }
        // Generar 10 espacios con libros
        foreach ($libros as $libro) {
            $imagen = file_exists($libro["imagen"]) ? $libro["imagen"] : "imagenes/default.jpg";
            echo "
            <div class='libro'>
                <img src='{$imagen}' alt='{$libro['titulo']}'>
                <h3>{$libro['titulo']}</h3>
            </div>
            ";
        }
        ?>
    </div>
    <footer>
        © 2025 Biblioteca Digital - Ayuntamiento de Puebla. Todos los derechos reservados.
    </footer>
</div>
<script>
    function buscarLibros() {
        const input = document.getElementById('search').value.toLowerCase();
        const libros = document.querySelectorAll('.libro');

        libros.forEach(libro => {
            const titulo = libro.querySelector('h3').innerText.toLowerCase();
            libro.style.display = titulo.includes(input) ? 'block' : 'none';
        });
    }
</script>
</body>
</html>
