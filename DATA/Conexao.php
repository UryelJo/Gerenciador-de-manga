<?php

    namespace DATA;

    use \PDO;

    class Conexao{
        private static $dbNome = 'db';
        private static $dbHost = '127.0.0.1';
        private static $dbUsuario = 'root';
        private static $dbSenha = '12345';

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