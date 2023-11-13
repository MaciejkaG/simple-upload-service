<?php
    $filesDir = "../files/"; // Musi kończyć się slashem!
    $redirectRoute = "/upload"; // Adres względny do któego ma przekierować, jeżeli masz index.php w public/upload to powinno być to /upload

    $targetFile = $filesDir . basename($_GET["filename"]); // Ustawienie zmiennej $targetFile odpowiedniej $filesDir + nazwa przesłanego pliku
    if (file_exists($targetFile)) {
        if (unlink($targetFile)) { // Skopiuj zuploadowany plik do poprawnego miejsca na serwerze
            http_response_code(200);
            header('Location: '.$redirectRoute); // Przekieruj z powrotem do strony głównej
        } else { // W razie gdyby coś nie wyszło po stronie serwera podczas kopiowania pliku
            http_response_code(500);
            echo "Sorry, there was an error removing your file.";
        }
    } else {
        http_response_code(404);
        echo "404 - Resource doesn't exist (file doesn't exist)";
    }
?>