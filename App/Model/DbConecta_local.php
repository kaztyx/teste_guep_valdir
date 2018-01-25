<?php

namespace Model;

use PDO;

class DbConecta {

	protected static $db;

	private function __construct() {

    # Informações sobre o banco de dados:
	
	$db_name = 'teste_guep';
	$db_user = 'root';
	$db_pass = '';
	$db_host = 'localhost';
	$db_driver = "mysql";

	# Informações sobre o sistema:
    $sistema_titulo = "Teste Guep";
    $sistema_email = "valdir@ingraphics.com.br";

	try
        {
            # Atribui o objeto PDO à variável $db.
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_name", $db_user, $db_pass);
            # Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codificação UFT-8.
            self::$db->exec('SET NAMES utf8');
        }
        catch (PDOException $e)
        {
            # Envia um e-mail para o e-mail oficial do sistema, em caso de erro de conexão.
            mail($sistema_email, "PDOException em $sistema_titulo", $e->getMessage());
            # Então não carrega nada mais da página.
            die("Connection Error: " . $e->getMessage());
        }
    }

    # Método estático - acessível sem instanciação.
    public static function conecta()
    {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db)
        {
            new DbConecta();
        }
        # Retorna a conexão.
        return self::$db;
    }
}

