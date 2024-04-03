<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

// Iniciar una nueva sesión cURL, ch de curlHandler
$ch = curl_init(API_URL);
// Indicamos que queremos recibir el resultado de la petición
// y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutamos la petición y guardamos el resultado
$result = curl_exec($ch);
// Obtenemos el código de respuesta
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// Decodificamos el JSON obtenido
$data = json_decode($result, true);
// Cerrar la sesión cURL
curl_close($ch);

$days = $data['days_until'];

$untilMessage = match (true) {
  $days === 0 => "¡Hoy se estrena! 🎉",
  $days === 1 => "¡Mañana se estrena! 🎬",
  $days < 7 => "¡Esta semana se estrena! 🎉",
  $days < 30 => "¡Este mes se estrena! 🍿",
  $days < 60 => "¡Menos de dos meses para estrenarse! 📅",
  default => "$days días hasta el estreno 📅"
}
?>

<head>
  <title>Próxima película de Marvel: <?= $data['title'] ?></title>
  <meta name="description" content="Descubre cuál será la próxima película de Marvel y cuándo se estrenará.">
  <meta name="author" content="Miguel Ángel Durán">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
  <section>
    <img src="<?= $data['poster_url'] ?>" alt="<?= $data['title'] ?>" width="300">
  </section>


  <hgroup>
    <h2 style="color: #FDDA0D;"><?= $data['title'] ?></h2>
    <p>es la próxima película de Marvel</p>
  </hgroup>

  <blockquote style="font-size: 16px">
    <?= $data['overview'] ?>
  </blockquote>

  <hr>

  <p>
    🗓️ Fecha de estreno: <strong><?= $data['release_date'] ?></strong>
    <br /><small style="color: #FDDA0D; opacity: .7"><?= $untilMessage ?></small>
  </p>

  <p>🎥 Próxima película: <strong><?= $data['following_production']['title'] ?><strong></p>
</main>

<style>
  :root {
    color-scheme: dark light;
  }

  body {
    display: grid;
    place-content: center;
    font-family: system-ui;
    font-size: 24px;
  }

  img {
    margin: 0 auto;
    border-radius: 4px;
  }
</style>