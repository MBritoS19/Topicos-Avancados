<?php
// Arquivo: database.php
require_once 'config.php';

/**
 * Conecta ao banco de dados e retorna o objeto de conexão.
 *
 * @return mixed Objeto de conexão do SQL Server ou false em caso de erro.
 */
function connectDatabase() {
    $connectionOptions = array(
        "Database" => DB_DATABASE,
        "Uid" => DB_UID,
        "PWD" => DB_PWD
    );
    
    $conn = sqlsrv_connect(DB_SERVERNAME, $connectionOptions);
    
    if ($conn === false) {
        // Para depuração:
        // die(print_r(sqlsrv_errors(), true));
        // Em produção, registre o erro em um log seguro.
        return false;
    }
    
    return $conn;
}

/**
 * Executa uma consulta SQL e retorna o resultado.
 *
 * @param string $sql A consulta SQL a ser executada.
 * @param array $params Parâmetros para a consulta preparada (opcional).
 * @return mixed Retorna o resultado da consulta ou false em caso de erro.
 */
function executeQuery($conn, $sql, $params = []) {
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        // Para depuração:
        // die(print_r(sqlsrv_errors(), true));
        // Em produção, registre o erro em um log seguro.
        return false;
    }
    
    return $stmt;
}

?>