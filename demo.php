<?php

define(
  'LOGO_URL',
  "https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg"
);

$name = 'Miguel';
$age = 18;
$isDev = true;

$output = "Hola, $name. Tienes $age años... 😜";
?>

<?php

$isOld = $age > 18;
$allTrue = $isOld && $isDev;
$someTrue = $isOld || $isDev;

$oldMessage = match ($age) {
  0, 1, 2 => "Eres un bebé, $name. 👶",
  3, 4, 5, 6, 7, 8, 9, 10 => "Eres un niño, $name. 👦",
  11, 12, 13, 14, 15, 16, 17 => "Eres joven, $name. 😜",
  18, 19, 20, 21 => "Eres mayor de edad, $name. 👨",
  default => "Tienes $age años, $name. 👍"
};

$oldMessage = match (true) {
  0, 1, 2 => "Eres un bebé, $name. 👶",
  $age < 10 => "Eres menor de edad, $name. 😜",
  $age < 18 => "Eres joven, $name. 😜",
  $age === 18 => "Eres mayor de edad, $name. ✅",
  $age < 40 => "Eres joven, $name. 👨",
  $age > 40 => "Eres un viejuno, $name. 👴",
  default => "Tienes $age años, $name. 👍"
};
?>

<h2><?= $oldMessage ?></h2>

<?php if ($allTrue) : ?>
  <h1>Todo es verdadero. 😎</h1>
<?php elseif ($someTrue && $name === 'Miguel') : ?>
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