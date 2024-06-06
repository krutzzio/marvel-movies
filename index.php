<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>

<head>
    <title>Next MCU FILM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<body>
    <h2>The following <?= $data["type"]; ?> of MCU is:</h2>
    <h1><?= $data["title"]; ?></h1>
    <section>
        <img src="<?= $data["poster_url"]; ?>" alt="Poster de la peli">
    </section>

    <hgroup>
        <h2>Realeased in: <span><?= $data["days_until"]; ?></span> days</h2>
        <h3><?= $data["release_date"]; ?></h3>
        <br>
        <h3>Plot:</h3>
        <p><?= $data["overview"]; ?></p>
    </hgroup>

    <hgroup>
        <h4>After <?= $data["title"]; ?> a <?= $data["following_production"]["type"]; ?> is coming:</h4>
        <br>
        <h3><?= $data["following_production"]["title"]; ?></h3>
        <br>
        <h3><?= $data["following_production"]["release_date"]; ?></h3>
    </hgroup>

    <section>
        <img src="<?= $data["following_production"]["poster_url"]; ?>" alt="Poster de la peli">
    </section>
</body>

<style>
    body {
        max-width: 700px;
        margin: 5rem auto;
        text-align: center;
    }

    img {
        display: block;
        width: 300px;
        margin: auto;
        border-radius: 15px;
    }
</style>