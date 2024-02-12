<?php
define('FILE_ACCESS', TRUE);

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    require_once("{$_SERVER['DOCUMENT_ROOT']}/config/functions.inc.php");
    require_once("{$_SERVER['DOCUMENT_ROOT']}/config/db.inc.php");

    function canRead()
    {
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('Europe/Istanbul'));
        $now = $date->format('Y-m-d');
        $deadline = '2024-02-12';

        if ($now == $deadline) {
            return true;
        } else {
            return false;
        }
    }

    $unreadable_body = <<<HTML
                <div class="note-content">
                    <div class="lock-container dynamic-content">
                        <img src="public/imgs/locked.svg" alt="lock">
                    </div>
                    <h5>Bu içerik 12 Şubat 2024'e kadar mühürlenmiştir.</h5>
                </div>
        HTML;

    $id = getSafeValue($_POST['id']);

    try {
        $query = "SELECT author, content FROM note WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->execute([
            ':id' => $id
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        sendErrorResponse('Not bulunurken bir hata oluştu.');
    } finally {
        $pdo = null;
    }

    $readable_body = <<<HTML
                <div class="note-message">
                    <textarea id="message" spellcheck="false" readonly cols="30" rows="10" maxlength="350">{$result['content']}</textarea>
                </div>
        HTML;

    $last_part = <<<HTML
                <div class="form-group btns">
                    <div class="note-author">
                        <h5>Yazar: <span style="color:var(--secondary);">{$result['author']}</span></h5>
                    </div>
                    <button class="cancel">Kapat</button>
                </div>
        HTML;

    $final_product = canRead() ? $readable_body . $last_part : $unreadable_body . $last_part;

    sendSuccessResponse($final_product);
} else {
    header("HTTP/1.1 403 Forbidden");
    include($_SERVER['DOCUMENT_ROOT'] . '/errors/403.php');
    exit;
}
