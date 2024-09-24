<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Transferência de Arquivos</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            width: 400px;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        button {
            flex: 1 1 calc(50% - 10px);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        .section {
            display: none;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="file"] {
            margin-bottom: 10px;
            color: #e0e0e0;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding: 10px;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <button onclick="showSection('internalUpload')">Upload (Pasta de Uploads)</button>
            <button onclick="showSection('externalUpload')">Upload (Pasta de Pent)</button>
            <button onclick="showSection('internalDownload')">Baixar (Pasta de Uploads)</button>
            <button onclick="showSection('externalDownload')">Baixar (Pasta de Pent)</button>
        </nav>
        
        <div id="internalUpload" class="section">
            <h1>Fazer Upload (Pasta de Uploads)</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="folder" value="uploads">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload File" name="submit">
            </form>
        </div>

        <div id="externalUpload" class="section">
            <h1>Fazer Upload (Pasta de Pent)</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="folder" value="pent">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload File" name="submit">
            </form>
        </div>

        <div id="internalDownload" class="section">
            <h1>Baixar Arquivos (Pasta de Uploads)</h1>
            <ul>
                <?php
                $dir = "uploads/";
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if ($file != "." && $file != "..") {
                                echo "<li><a href='uploads/$file' download>$file</a></li>";
                            }
                        }
                        closedir($dh);
                    }
                }
                ?>
            </ul>
        </div>

        <div id="externalDownload" class="section">
            <h1>Baixar Arquivos (Pasta de Pent)</h1>
            <ul>
                <?php
                $dir = "pent/";
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if ($file != "." && $file != "..") {
                                echo "<li><a href='pent/$file' download>$file</a></li>";
                            }
                        }
                        closedir($dh);
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>
