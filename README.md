# phprouter
Simple PHP Router in 88 strings of code

## How use:
```php

<?php

require_once __DIR__ . '/core/Router.Class.php';

Router::get('/', function () {
	echo 'Main Page';
});

Router::get('/{id}', function ($id) {
	echo $id;
});

Router::get('/user/{id}/medias/{type}', function ($id, $type) {
	echo $id, ' ', $type;
});

// Init Router
Router::init(function () {
	// Pass broken routes to root path 
	header('Location: /');
});

```
Example on http://router.endem.su/

## Use it for free and wellcome to Contribute
For additional information please write ur email to alex@endem.su
