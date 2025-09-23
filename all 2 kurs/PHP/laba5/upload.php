<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка файла на сервер</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .upload-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="file"] {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            text-align: center;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .file-info {
            margin-top: 20px;
            text-align: left;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h1>Загрузка файла</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES['fupload'])) {
                $file = $_FILES['fupload'];


                echo '<div class="file-info">';
                echo 'Имя файла: ' . $file['name'] . '<br>';
                echo 'Размер файла: ' . $file['size'] . ' байт<br>';
                echo 'Временное имя файла: ' . $file['tmp_name'] . '<br>';
                echo 'Тип файла: ' . mime_content_type($file['tmp_name']) . '<br>';
                echo 'Код ошибки: ' . $file['error'] . '<br>';

                if (mime_content_type($file['tmp_name']) == 'image/jpeg') {
                    $uploadDir = 'upload/';
                    $fileHash = md5_file($file['tmp_name']);
                    $filePath = $uploadDir . $fileHash . '.jpg';
                    if (move_uploaded_file($file['tmp_name'], $filePath)) {
                        echo 'Файл успешно загружен в: ' . $filePath;
                    } else {
                        echo 'Ошибка при загрузке файла.';
                    }
                } else {
                    echo 'Загружаемый файл не является изображением JPEG.';
                }
                echo '</div>';
            }
        }
        ?>
        <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
                <input type="file" name="fupload"><br>
                <button type="submit">Загрузить</button>
            </p>
        </form>
    </div>
</body>
</html>
