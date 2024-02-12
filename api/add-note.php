<?php
define('FILE_ACCESS', TRUE);

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    require_once("{$_SERVER['DOCUMENT_ROOT']}/config/functions.inc.php");
    require_once("{$_SERVER['DOCUMENT_ROOT']}/config/db.inc.php");

    function canAddNote()
    {
        return false;
    }

    // Use filter_input to sanitize the input
    $author = getSafeValue($_POST['note-author']);
    $content = getSafeValue($_POST['note-content']);

    if (!canAddNote()) {
        sendErrorResponse('Not eklemek için süreniz dolmuştur.');
    }

    if (empty($author) || empty($content)) {
        sendErrorResponse('Lütfen tüm alanları doldurunuz.');
    }

    if (strlen($author) > 50) {
        sendErrorResponse('İsminiz 50 karakterden uzun olamaz.');
    }

    if (strlen($content) > 350) {
        sendErrorResponse('Notunuz 350 karakterden uzun olamaz.');
    }

    try {
        $query = "INSERT INTO note (author, content) VALUES (:author, :content)";
        $statement = $pdo->prepare($query);
        $statement->execute([
            ':author' => $author,
            ':content' => $content
        ]);
    } catch (PDOException $e) {
        sendErrorResponse('Notunuz eklenirken bir hata oluştu.');
    } finally {
        $pdo = null;
    }

    sendSuccessResponse('Notunuz başarıyla eklendi.');
} else {
    header("HTTP/1.1 403 Forbidden");
    include($_SERVER['DOCUMENT_ROOT'] . '/errors/403.php');
    exit;
}
