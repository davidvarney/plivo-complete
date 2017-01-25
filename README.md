Plivo Complete
============
Plivo Complete is a simple Laravel 5 driver for the Plivo PHP library

# Installation
## Step 1
Install via [composer](https://getcomposer.org/)

### Method 1: via CLI (recommended)
<pre>
$ composer require davidvarney/plivo-complete:<i>1.0.0</i>
</pre>

### Method 2: via composer.json
```json
"require": {
    ...
    "davidvarney/plivo-complete": "1.0.0",
},
```
## Step 2
### Laravel Service Provider
In the `config/app.php` file and within the `'providers' => [` array place the following towards the end of the array
```php
'providers' => [
    ...
    DavidVarney\Plivo\PlivoServiceProvider::class,
],
```
### Laravel Alias
In the same `config/app.php` file and within the `'aliases' => [` array place the following towards the end of the array
```php
'aliases' => [
    ...
    'Plivo' => DavidVarney\Plivo\Plivo::class,
],
```
## Step 3
You don't have to run the `dump-autoload` command but I usually do just for good measure.
```bash
$ composer dump-autoload
$ composer update
```
## Step 4
Next we're going to create the necessary config file so that we can insert our Auth ID and Auth Token from our Plivo account
```bash
$ php artisan vendor:publish
```
After publishing the config file make your way to the `config` directory and look for the following file: `config/plivo.php`

You should see that the config file is looking for two environment variables. You have two options.
### Option #1
Place the auth_token and auth_id within the `env()` function like so:
```php
return [
    'auth_token' => env('PLIVO_AUTH_TOKEN', TOKEN_HERE),
    'auth_id'    => env('PLIVO_AUTH_ID', ID_HERE)
];
```
### Option #2 (recommended)
You can simply leave the config file alone and place the `'PLIVO_AUTH_TOKEN'` and `'PLIVO_AUTH_ID'` inside of the `.env` file.
```
...
PLIVO_AUTH_TOKEN=YOUR_AUTH_TOKEN_HERE
PLIVO_AUTH_ID=YOUR_AUTH_ID_HERE
```
## Usage
Now you should be able to simply use it within a Controller like so
```php
<?php

namespace App\Http\Controllers\YourController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Plivo;

class YourController extends Controller
{
    public function index()
    {
        $plivo = new Plivo;
        return view('myview.index', array(
            'plivo' => $plivo
        ));
    }
}
```
Then your view would look something like this:
```blade
@extends('layouts.frontend.app')

@section('content')
    {!! dd($plivo->get_account()) !!}
@endsection
```
You can use any RestAPI method that is available in the [Plivo RestAPI PHP library](https://www.plivo.com/docs/helpers/php/)
