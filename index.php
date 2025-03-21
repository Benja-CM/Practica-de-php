<?php

# echo phpinfo(); 

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);

# Indicar que queremos recibir el resultado de la petición sin mostrar en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Ejecutarmos la petición y guardamos el resultado
$result = curl_exec($ch);

$data = json_decode($result, true);

curl_close($ch);

?>

<head>
    <title>La próxima película de Marvel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <br>
    <section>
        <h2>La proxima pelicula de marvel</h2>
        <p>La próxima película de Marvel es <strong><?= $data['title']; ?></strong> y se estrenará el
            <strong><?= $data['release_date']; ?></strong>
        </p>
        <img src="<?= $data['poster_url']; ?>" width="300" alt="Poster de <?= $data['title']; ?>" style="border-radius: 10px;">
    </section>

    <hgroup>
        <p>SOLO FALTAN <strong><?= $data['days_until'] ?></strong> DÍAS</p>
        <p> <?= $data['overview'] ?> </p>
        <br>
        <p>La siguiente pelicula después de <strong><?= $data['title']; ?></strong> es
            <strong><?= $data['following_production']['title']; ?></strong> y se estrenará el
            <strong><?= $data['following_production']['release_date']; ?></strong>
        </p>
    </hgroup>

</main>

<style>

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;

        /* Asegura que los elementos se apilen verticalmente */
        flex-direction: column; 

        /* Centra verticalmente */
        justify-content: center;
        align-items: center;

        height: 90vh; /* Hace que la sección ocupe toda la altura de la ventana */
    }

    hgroup {
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }

    </style>