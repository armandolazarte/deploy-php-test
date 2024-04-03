<?php

define('LOGO_URL', "https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg");

$name = 'Miguel';
$age = 2;
$isDev = true;

$output = "Hola, $name. Tienes $age años... 😜";
?>

<?php

$isOld = $age > 18;
$allTrue = $isOld && $isDev;
$someTrue = $isOld || $isDev;

if ($isOld) {
  echo "<h2>Eres mayor de edad, $name. 😎</h2>";
} else {
  echo "<h2>Eres un yogurín, $name. 😜</h2>";
}

?>

<?php if ($allTrue): ?>
  <h1>Todo es verdadero. 😎</h1
<?php elseif ($someTrue && $name === 'Miguel'): ?>
  <h1>Algo es verdadero pero con midu nunca se sabe. 😜</h1>
<?php endif; ?>












<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="100">
<h1>
  <?= $output ?>
</h1>

<style>
  :root {
    color-scheme: dark light;
  }

  body {
    display: grid;
    place-content: center;
    font-family: system-ui;
  }

  img {
    margin: 0 auto;
  }
</style>