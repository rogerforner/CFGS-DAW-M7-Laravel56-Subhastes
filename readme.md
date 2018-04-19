> M07 Desenvolupament web en entorn servidor
> Institut Montsià, Amposta (Terres de l'Ebre)
# M07 Desenvolupament web en entorn servidor

## Què és?

**Laravel5.6-Subhastes** és una pràctica del Cicle Formatiu de Grau Superior de _Desenvolupament d'Aplicacions Web_, de l'Institut Montsià (Amposta - Terres de l'Ebre).

## Qui?

Equip:
- [Joan Navarro](https://www.linkedin.com/in/joan-navarro-palatsi-171157145/)
- [Enric Beltran](https://www.linkedin.com/in/enric-beltran-cano-400264156/)
- [Roger Forner](https://www.linkedin.com/in/rogerforner/)

Professor:
- Toni Morant

## Per què?

En l'Institut Monstià es duu a terme el model d'estudi d'ABP, és a dir, tota la avaluació es realitza segons la realització d'Activitats Basades en Projectes, de tal manera que des de l'inici del curs estem treballant sobre casos reals, propis de l'àmbit professional cursat.

# Laravel 5.6

El nostre projecte és duu a terme mitjançant el framework PHP [Laravel](https://laravel.com/).

## Descarregar

Pots descarregar el projecte des del repositori del GitHub escribint la següent comanda en la terminal.

```
$ git clone https://github.com/navarropalatsi/Laravel5.6-Subhastes.git
```

_És necessari tenir instal·lat [git](https://git-scm.com/)._

## Instal·lació

Un cop descarregat hem d'instal·lar les dependències mitjançant **composer** i, també, **npm**.

```
$ composer install && npm install
```

_És necessari tenir instal·lat [composer](https://getcomposer.org/) i [npm](https://www.npmjs.com/get-npm)._

## Configuració

### .env

Un cop instal·lades les dependències en hem de situar en el directori del projecte (terminal), tot seguit copiarem el fitxer _.env.example_ i el copiarem a **.env**.

```
$ cp .env.example .env
```

### Collection.php
Moure el fitxer _Collection.php_ a la següent ruta del /vendor.

```
$ cp Collection.php vendor/laravel/framework/src/Illuminate/Support/
```

### Key

Per poder executar sense problemes l'aplicació web hem de generar una _key_. En farem servir la següent comanda artisan.

```
$ php artisan key:generate
```

### Migracions (DB)

Crearem una base de dades mitjançant el gestor que es disposi. Aquesta pot tenir el nom que sigui, per exemple, la podem anomenar _daw7_.

Un cop tinguem la base de dades creada, ens dirigirem al fitxer _.env_ i escriurem el nom d'aquesta, l'usuari que hi accedeix i la seva clau.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=daw7
DB_USERNAME=root
DB_PASSWORD=root
```

_Depenent del projecte, es poden emplenar la resta de paràmetres de configuració, inclòs crear-ne de nous._

Un cop configurada la base de dades hem de dur endavant les migracions. Amb aquestes es crearan les taules.

```
$ php artisan migrate
```

En el nostre cas hem creat uns usuaris d'exemple, per tal de poder-los inserir a la base de dades hem de dur endavant els "seeders".

```
$ php artisan migrate:refresh --seed
```
### Enviament de correus electrònics

Per permetre l'enviament de correus electrònics, necessari per al registre d'usuaris/ies (verificació de email), és necessari disposar d'un compte [Mailtrap](https://mailtrap.io), [Mailgun](), [Gmail](), etc. i emplenar les dades del següent apartat del _.env_.

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

_Depenent del projecte, es poden emplenar la resta de paràmetres de configuració, inclòs crear-ne de nous._

## Assets

En el nostre prjecte treballem amb fitxer JavaScript i SASS. Cada cop que en facis algun canvi s'ha de dur endavant:

- Executar cada cop que es realitzin canvis.
```
$ npm run dev
```
- Deixar executant-se sense la preocupació d'haver-ho de fer nosaltres cada cop que realitzem algun canvi.
```
$ npm run watch
```
- Preparar els _assets_ per a producció (minificació).
```
$ npm run production
```

## Servidor

Si estàs emprant _[Laragon](https://laragon.org/)_ no és necessari dur a terme la següent comanda, en cas contrari sí, doncs les vistes han de ser compilades i enviades a /public.

```
$ php artisan serve
```

_És important no aturar el servidor mentre es treballi amb l'aplicació web._

# Treballar amb les vistes

## Admin

Es crearan en la ruta _resources/views/admin_ i les vistes han de tenir les següents etiquetes Blade.

```
@extends('layouts.admin')
@section('title', 'Es veu en la pestanya del navegador i es correspon la meta-etiqueta title')
@section('description', 'meta-etiqueta description')
@section('content')

{{-- El contingut aquí --}}

@endsection
```

I el contingut s'ha d'iniciar amb un **row**.

```
@extends('layouts.admin')
@section('title', 'Un títol')
@section('description', 'Una descripció')
@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <h5 class="card-header">Apartat 1</h5>
        <div class="card-body">
          <h5 class="card-title">Tirant lo Blanc</h5>
          <p class="card-text">[...]</p>
        </div>
      </div><!-- /.card -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container -->
@endsection
```

_La raó per la qual el contingut s'ha d'iniciar amb un row és perquè la etiqueta @yield('content'), del layout, <u>està dintre d'un col</u>._

## Client

Es crearan en la ruta _resources/views_ i les vistes han de tenir les següents etiquetes Blade.

```
@extends('layouts.client')
@section('title', 'Un títol')
@section('description', 'Una descripció')
@section('content')

{{-- Contingut aquí --}}

@endsection
```

I el contingut s'ha d'iniciar amb un **container** o **container-fluid**.

```
@extends('layouts.client')
@section('title', 'Un títol')
@section('description', 'Una descripció')
@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <p>[...]</p>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container -->

@endsection
```

_Si tens qualsevol dubte entorn a la maquetació del lloc web, pots consultar el framework CSS emprat, [Bootstrap 4](https://getbootstrap.com/docs/4.0/layout/grid/)_

## Navegació

Dintre de _resources\views\layouts\partials_ trobarem, en l'arrel, la barra de navegació que comparteixen les vistes _admin_ i _client_.

- Barra de navegació compartida (Admin + Client): _resources\views\index.blade.php_
- Barra de navegació de l'Admin: _resources\views\layouts\partials\admin\navbar.blade.php_
