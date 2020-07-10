# ![](https://raw.githubusercontent.com/Zaanol/RedeSocial/master/img/logo.png)

>Autores: Willian Zanol, Rodrigo Dellagnolo e Felipe Fagundes 

## Instalação

### Banco de Dados
É necessário *importar* o banco de dados no MySql que se encontra na raiz do projeto nomeado como `redesocial.sql`

Após importação deve ser configurado o arquivo `db.php` 
```php
<?php
	$dbServidor = "127.0.0.1:{PORTA}";
	$dbUsuario  = "{USUARIO}";
	$dbSenha    = "{SENHA}";
	$dbBanco    = "{BANCO}";
	
	$conexao = mysqli_connect($dbServidor, $dbUsuario, $dbSenha, $dbBanco);
	
	if (mysqli_connect_errno($conexao))
	{
		echo "<h1>Problema ao conectar com o banco! Verifique.</h1>";
		die();
	}
?>
```
