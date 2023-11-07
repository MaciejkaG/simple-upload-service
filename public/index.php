<?php
    $filesDir = "../files/"; // Musi kończyć się slashem!

    $dirList = preg_grep('/^([^.])/', scandir($filesDir)); // Pobierz listę plików z pominięciem nazw zaczętych kropką ('.')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload service</title>
</head>
<body>
    <h1>Upload a file</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select a file to upload:
        <input type="file" name="file">
        <input type="submit" value="Upload" name="submit">
    </form>
    <h1>Uploaded files</h1>
    <p>
        <?php
            if (empty($dirList)) { // Wyświetl ładną wiadomość, jeśli lista plików jest pusta
                echo "Nothing to see here (yet)";
            } else {
                foreach ($dirList as $fName) {
                    echo "<a href=\"file.php?name=$fName\">$fName</a><br>"; // Pętla wyświetlająca każdy element z $dirList w formie linku
                }
            }
        ?>
    </p>
</body>
</html>