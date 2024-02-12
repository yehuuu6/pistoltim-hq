<?php

if (!defined('FILE_ACCESS')) {
    header("HTTP/1.1 403 Forbidden");
    include($_SERVER['DOCUMENT_ROOT'] . '/errors/403.php');
    exit;
}

require_once("{$_SERVER['DOCUMENT_ROOT']}/config/db.inc.php");

/**
 * Sends an error response to the client and terminates the script.
 * @param string $log The error message to be sent to the client
 */
function sendErrorResponse(string $log)
{
    $result = array('error', $log);
    echo json_encode($result);
    die();
}

/**
 * Sends a success response to the client and terminates the script.
 * @param string $log The success message to be sent to the client
 */
function sendSuccessResponse(string $log)
{
    $result = array('success', $log);
    echo json_encode($result);
    die();
}

/*
* Sanitizes the given value and returns it.
* @param string $value The value to be sanitized
* @return string The sanitized value
*/
function getSafeValue($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Gets all the notes from the database and returns them.
 */

function getNotes()
{
    global $pdo;
    try {
        $query = "SELECT id, author FROM note ORDER BY id DESC";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        sendErrorResponse('Notlar getirilirken bir hata oluştu.');
    } finally {
        $pdo = null;
    }
    $result = array('success', $notes);
    return $result;
}
