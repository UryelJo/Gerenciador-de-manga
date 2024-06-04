<?php

    namespace DATA;

    use \PDO;

    class Conexao{
        private static $dbNome = 'db';
        private static $dbHost = 'localhost';
        private static $dbUsuario = 'root';
        private static $dbSenha = '';

        private static $cont = null;
    
        public static function conectarComDB(){
            if(self::$cont == null){
                try{
                    self::$cont = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbNome,  self::$dbUsuario , self::$dbSenha);

                } catch (\PDOException $exception) {
                    die ($exception->getMessage());
                }
            }
            return self::$cont;
        }

        public static function desconectarComDB(){
            self::$cont = null;
            return self::$cont;  
        }
}

?>