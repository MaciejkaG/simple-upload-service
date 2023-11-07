<?php
    $filesDir = "../files/"; // Musi kończyć się slashem!

    $dirList = preg_grep('/^([^.])/', scandir($filesDir)); // Skanuj 
    if (in_array($_GET['name'], $dirList) && file_exists($filesDir . $_GET['name'])) {
        header('Content-Description: File Transfer'); // Ustaw headery które będą pokazywać przeglądarce, że zasób jest plikiem do pobrania, oraz będą wysyłać metadane pliku
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filesDir . $_GET['name']));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filesDir . $_GET['name']));
        ob_clean();
        flush(); // Wyczyść bufer outputu, żeby nie obciążać pliku
        readfile($filesDir . $_GET['name']); // Zwróć plik do klienta
        exit;
    } else { http_response_code(404); echo "<h1>404 - Not Found (Requested file not found)</h1>"; }
?>
