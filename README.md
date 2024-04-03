# Curso de PHP

## Historia rápida

PHP es un lenguaje de programación interpretado del lado del servidor y de uso general que se adapta especialmente al desarrollo web

PHP significa "PHP: Hypertext Preprocessor". Sí, la primera P se refiere así mismo.

A día de hoy, PHP es uno de los lenguajes de programación más populares del mundo. Se estima que 2 de cada 3 webs están utilizando PHP en su backend.

Eso hace que sea un lenguaje muy demandado y con una comunidad muy grande.

## Instalación

Documentación oficial de PHP:
https://php.net -> Documentation -> Spanish

Ver cómo instalar PHP en diferentes sistemas.

En mi caso, usamos Homebrew para instalar PHP en macOS.

```bash
brew install php
```

Revisamos que esté bien instalado y la versión actual:

```bash
php -v
```

## IDE

-> [Code](https://code.visualstudio.com/)
-> [PHPStorm](https://www.jetbrains.com/es-es/phpstorm/)

Yo voy a usar Code y vamos a usar una extensión mejor que la nativa de Code que te formatea el código y te indica algunos errores útiles.

-> Instalar PHP Intelephense

-> Hay que desactivar la extensión de PHP de Code:
@builtin php
❌ características del lenguaje
✅ conceptos básicos del lenguaje

## Hello World

Miramos todos los comandos:
```bash
php --help
```

Ejecutamos nuestra primera línea de PHP:

```bash
php -r "echo 'Hola mundo';"
```

Ejecutamos el fichero `index.php`:

```bash
php index.php
```

## Levantando nuestro servidor PHP

```bash
php -S localhost:8000
```

Ahora podemos acceder a nuestro servidor en `http://localhost:8000` que muestra el contenido del `index.php`.

## Sintaxis

Probar:
- Eliminar el `?>` final
- Eliminar el `;` final
- Añadir otro `echo`, explicar que al compilar internamente PHP elimina todos los saltos de línea y espacios en blanco innecesarios.
- Paréntesis en `echo` son opcionales
  - Otros comandos con paréntesis opcionales: echo, include, require, return, print, list, die, exit...

## HTML y Short tag echo para PHP

Envolvemos el mensaje con HTML.

```php
<h1>
  <?php echo 'Curso de PHP'; ?>
</h1>
```

Usar short tag echo es muy común en PHP, y se puede simplificar aún más:

```php
<h1><?= 'Hola mundo'; ?></h1>
```

## Variables

Para crear una variable en PHP, iniciamos con el símbolo `$` seguido del nombre de la variable.

```php
<?php
  $name = 'Miguel';
?>

<h1><?= $name ?>
```

No es necesario declarar el tipo de variable, PHP lo hace por nosotros y luego hablaremos más de esto.

No puedes empezar el nombre de la variable con un número y no puede contener símbolos especiales, excepto el guion bajo `_` dentro del nombre:

```php
<?php
  $name = 'Miguel';
  $1edad = 30; // ❌
  $al$tura = 1.80; // ❌
 $isDev = true;
?>
```

Aunque yo os recomiendo que siempre uséis camelCase para vuestras variables.

## Tipado en PHP

PHP es un lenguaje de tipado dinámico, débil y gradual.

- Dinámico: No es necesario declarar el tipo de variable y puede cambiar en tiempo de ejecución.

```php
<?php
  $name = 'Miguel';
  $name = 2;
?>

<h1><?= $name ?>
```

- Débil: PHP intentará convertir automáticamente los tipos de variables según sea necesario.

```php
<?php
  $age = '2';
  $age = $age + 2;
?>

<h1><?= $age ?>
```

- Gradual: Esto significa que PHP puede inferir el tipo de variable, pero también se puede declarar explícitamente opcionalmente en algunos contextos.

Lo veremos más adelante.

Por ahora vamos a ver dos métodos nativos de PHP muy útiles para depurar y entender el tipo de variable que estamos manejando.

Uno es `var_dump` y el otro es `gettype`.

```php
<?php
  $name = 'Miguel';
  $age = 2;
 $isDev = true;

  var_dump($name);
  var_dump($age);
  var_dump($es_desarrollador);
?>

<h1><?= $name ?></h1>
```

`gettype` con saltos de línea:

```php
<?php
  $name = 'Miguel';
  $age = 2;
 $isDev = true;

  echo gettype($name);
  echo '<br>';
  echo gettype($age);
  echo '<br>';
  echo gettype($es_desarrollador);
?>
```

Más adelante veremos que tienes métodos más concretos para revisar el tipo de variable, como `is_string`, `is_int`, `is_bool`, etc.

Hacer hover en el gettype para ver sus tipos.

## Type Casting (Forzado de tipos)

PHP nos permite convertir un tipo de variable en otro.

```php
<?php
  $name = 'Miguel';
  $name = (int) $name;

  $age = 2;
  $age = (bool) $age;

 $isDev = true;
 $isDev = (string)$isDev;

  var_dump($name);
  echo '<br>';
  var_dump($age);
  echo '<br>';
  var_dump($es_desarrollador);
?>
```

[Type Casting](https://www.php.net/manual/es/language.types.type-juggling.php)

## Concatenación de cadenas de texto

Vamos a mostrar un título con el nombre de la persona y su edad.
Las cadenas de texto en PHP se pueden crear con comillas simples o dobles.
Por ahora, vamos a usar comillas simples y luego veremos las diferencias con las dobles.

```php
<?php
  $name = 'Miguel';
  $age = 2;
 $isDev = true;
?>

<h3>
  <?= 'Hola, ' . $name . ". Tienes " . $age . " años... 😜"; ?>
</h3>
```

Funciona con saltos de línea:

```php
<?php
  $name = 'Miguel';
  $age = 2;
 $isDev = true;
?>

<h3>
  <?= 'Hola, '
    . $name
    . ". Tienes "
    . $age
    . " años... 😜";
  ?>
</h3>
```

### Combined operator

```php
<?php
  $name = 'Miguel';
  $age = 2;
 $isDev = true;

  $output = 'Hola, ' . $name . '. ';
  $output .= 'Tienes ' . $age . ' años... 😜';
?>

<h3>
  <?= $output ?>
</h3>
```

### Interpolación de cadenas

La forma más fácil.

```php
<?php
  $name = 'Miguel';
  $age = 2;
 $isDev = true;

  $output = "Hola, $name. Tienes $age años... 😜"
?>;

<h3>
  <?= $output ?>
</h3>
```

Para escapar cadenas de texto:

```php
<?php
  $name = 'Miguel';
  $age = 2;
 $isDev = true;

  $output = "Hola, \$name. Tienes \$age años... 😜";
?>

<h3>
  <?= $output ?>
</h3>
```

## Crear constantes en PHP

Las variables están destinadas a cambiar, pero las constantes no.
Hay 2 tipos de constantes en PHP:
  - globales: las que se definen con `define` (con mayúsculas y guiones bajos)
  - locales: las que se definen con `const`.

### Crear globales

```php
<?php

  define('LOGO_URL', "https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg");
  define('NOMBRE', 'Miguel');
  define('NOMBRE', 'Miguel'); // ⚠️ advertencia, aunque se ignora

  $name = 'Miguel';
  $age = 2;
 $isDev = true;

  $output = "Hola, " . NOMBRE . ". Tienes \$age años... 😜";
?>

<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="100">
<h3>
  <?= $output ?>
</h3>
```

## Crear locales

```php
<?php

  const PI = 3.1416;
  const NOMBRE = 'Miguel';
  const NOMBRE = 'Miguel'; // ❌ se ignora

  $name = 'Miguel';
  $age = 2;
  $isDev = true;

  $output = "Hola, \$name. Tienes \$age años... 😜"
  
?>;
```

## Booleanos

Añadir debajo del resto de <?php>:

```php
<?php

$isOld = $age > 18;

if ($isOld) {
  echo "<h2>Eres mayor de edad, $name. 😎</h2>";
} else {
  echo "<h2>Eres un yogurín, $name. 😜</h2>";
}

?>
```

Más con `else if ` o `elseif`:

```php
<?php

$isOld = $age > 18;
$allTrue = $isOld && $isDev;
$someTrue = $isOld || $isDev;

if ($allTrue) {
  echo "<h1>Todo es verdadero. 😎</h1>";
} elseif ($someTrue && $name === 'Miguel') { // explicar la igualdad estricta
  echo "<h1>Algo es verdadero pero con midu nunca se sabe. 😜</h1>";
}

// if ($isOld) {
//   echo "<h2>Eres mayor de edad, $name. 😎</h2>";
// } else {
//   echo "<h2>Eres un yogurín, $name. 😜</h2>";
// }
```

Sintaxis alternativa con `:`

```php
if ($allTrue):
  echo "<h1>Todo es verdadero. 😎</h1>";
elseif ($someTrue && $name === 'Miguel'):
  echo "<h1>Algo es verdadero pero con midu nunca se sabe. 😜</h1>"
endif;
```

¿Para qué se usa la sintaxis alternativa? Para mezclar con HTML.

```php
<?php if ($allTrue): ?>
  <h1>Todo es verdadero. 😎</h1
<?php elseif ($someTrue && $name === 'Miguel'): ?>
  <h1>Algo es verdadero pero con midu nunca se sabe. 😜</h1>
<?php endif; ?>
```

## Ternaria

```php
if ($allTrue):
  echo "<h1>Todo es verdadero. 😎</h1>";
elseif ($someTrue && $name === 'Miguel'):
  echo "<h1>Algo es verdadero pero con midu nunca se sabe. 😜</h1>"
endif;
```

Podría ser:

```php
echo $isOld
  ? "<h2>Eres mayor de edad, $name. 😎</h2>"
  : "<h2>Eres un yogurín, $name. 😜</h2>";
```

O podemos guardarlo en una variable:

```php
$oldMessage = $isOld
  ? "Eres mayor de edad, $name. 😎"
  : "Eres un yogurín, $name. 😜";
?>

<h2><?= $oldMessage ?></h2>
```

## Match

```php
$oldMessage = match ($age) {
  0, 1, 2 => "Eres un bebé, $name. 👶",
  3, 4, 5, 6, 7, 8, 9, 10 => "Eres un niño, $name. 👦",
  11, 12, 13, 14, 15, 16, 17 => "Eres joven, $name. 😜",
  18, 19, 20, 21 => "Eres mayor de edad, $name. 👨",
  default => "Tienes $age años, $name. 😜"
};
```

Evaluando expresiones. HAY QUE PASAR EL PARÁMETRO A TRUE.

```php
$oldMessage = match (true) {
  0, 1, 2 => "Eres un bebé, $name. 👶",
  $age < 10 => "Eres menor de edad, $name. 😜",
  $age < 18 => "Eres joven, $name. 😜",
  $age === 18 => "Eres mayor de edad, $name. ✅",
  $age < 40 => "Eres joven, $name. 👨",
  $age > 40 => "Eres un viejuno, $name. 👴",
  default => "Tienes $age años, $name. 👍"
};
```

## Arrays

Crear Array y acceder a la primera posición:

```php
<?php
  $bestLanguages = ['PHP', 'JavaScript', 'Python', 1, 2];
?>

<h3>
  <?= $bestLanguages[0] ?>
</h3>
```

Añadir más elementos:

```php
<?php
$bestLanguages = ['PHP', 'JavaScript', 'Python', 1, 2];
$bestLanguages[] = 'TypeScript';
?>

<h3>
  <?= $bestLanguages[5] ?>
</h3>
```

Iterar sobre un array:

```php
<?php
$bestLanguages = ['PHP', 'JavaScript', 'Python'];
$bestLanguages[] = 'TypeScript';
?>

<ul>
  <?php foreach ($bestLanguages as $language) : ?>
    <li><?= $language ?></li>
  <?php endforeach; ?>
</ul>
```

Usar el índice del array:

```php
<?php
$bestLanguages = ['PHP', 'JavaScript', 'Python'];
$bestLanguages[] = 'TypeScript';
?>

<ul>
  <?php foreach ($bestLanguages as $key => $language) : ?>
    <li><?= "$key: $language" ?></li>
  <?php endforeach; ?>
</ul>
```

## Arrays asociativos

Un array asociativo es un array cuyos índices son cadenas de texto. En lugar de acceder a los elementos mediante un índice numérico, se accede mediante una clave. Conceptualmente, es como un diccionario.

```php
<?php
$person = [
  'name' => 'Miguel',
  'age' => 30,
  'isDev' => true
];

# se puede cambiar el valor de un elemento del array
$person['isDev'] = false;

# se puede añadir un nuevo elemento al array
$person['twitch'] = 'twitch.tv/midudev'
?>

<h3>
  Hola, <?= $person['name'] ?>. <br />
  Tu Twitch es <?= $person['twitch'] ?>
</h3>
```

## API

## Nuestro primer proyecto

Vamos a crear un pequeño proyecto que nos mostrará la próxima película de Marvel

```php
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

var_dump($data);
```

Creando la visualización de la info:

```php
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
    <h2><?= $data['title'] ?></h2>
    <p>es la próxima película de Marvel</p>
  </hgroup>
  <blockquote>
    <?= $data['overview'] ?>
  </blockquote>

  <hr>

  <p>🗓️ Fecha de estreno: <strong><?= $data['release_date'] ?></strong></p>
  <p>⏰ Días hasta el estreno: <strong><?= $data['days_until'] ?></strong></p>
  <p>🎥 Próxima película: <strong><?= $data['following_production']['title'] ?><strong></p>
</main>
```

Usamos match para mostrar un mensaje en función de los días que faltan para el estreno:

```php
$untilMessage = match (true) {
  $days === 0 => "¡Hoy se estrena! 🎉",
  $days === 1 => "¡Mañana se estrena! 🎬",
  $days < 7 => "¡Esta semana se estrena! 🎉",
  $days < 30 => "¡Este mes se estrena! 🍿",
  $days < 60 => "¡Menos de dos meses para estrenarse! 📅",
  default => "$days días hasta el estreno 📅"
}

<p>
  🗓️ Fecha de estreno: <strong><?= $data['release_date'] ?></strong>
  <br />
  <small style="color: #FDDA0D; opacity: .7"><?= $untilMessage ?></small>
</p>
```