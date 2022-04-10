# AleEvoluções - Site Institucional

Projeto desenvolvido para AleEvoluções Um site institucional simple e moderno.

## Instalação 

- Renomei o arquivo `config.test.php` para `config.php` e coloque as informações de acesso ao banco de dados e as urls locais de desenvolvimento e produção.

```php
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "");
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "");
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}
```

- No arquivo `environment.test.php` renomeie o arquivo para `environment.php` altere o ambimente descomentando o ambiente em execução:
```php
<?php
define("ENVIRONMENT", "development");
//define("ENVIRONMENT", "production");
?>
```

