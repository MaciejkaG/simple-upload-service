<?php
    $filesDir = "../files/"; // Musi kończyć się slashem!
    $redirectRoute = "/upload" // Adres względny do któego ma przekierować, jeżeli masz index.php w public/upload to powinno być to /upload

    $targetFile = $filesDir . basename($_FILES["file"]["name"]); // Ustawienie zmiennej $targetFile odpowiedniej $filesDir + nazwa przesłanego pliku
    if (isset($_POST["submit"])) { // Jeżeli to faktycznie jest formularz
        if (!file_exists($targetFile)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) { // Skopiuj zuploadowany plik do poprawnego miejsca na serwerze
                http_response_code(200);
                header('Location: '.$redirectRoute); // Przekieruj z powrotem do strony głównej
            } else { // W razie gdyby coś nie wyszło po stronie serwera podczas kopiowania pliku
                http_response_code(500);
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            http_response_code(403);
            echo "409 - Resource already exists (file already exists)";
        }
    }
?>