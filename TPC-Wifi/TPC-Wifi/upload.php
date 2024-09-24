<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    // Se não estiver logado, redirecione para a página de login
    header("Location: login.php");
    exit(); // Certifique-se de encerrar o script após redirecionar
}
?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica se o arquivo já existe
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Verifica o tamanho do arquivo (ajuste o limite conforme necessário)
if ($_FILES["fileToUpload"]["size"] > 500000) { // 500KB
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Permite certos formatos de arquivo (opcional, pode ser ajustado conforme a necessidade)
$allowedTypes = array(
    'jpg', 
    'jpeg', 
    'png', 
    'gif', 
    'pdf', 
    'txt', 
    'doc', 
    'docx', 
    'xlsx', 
    'pptx', 
    'zip', 
    'rar', 
    'iso'
);
if (!in_array($imageFileType, $allowedTypes)) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, TXT, DOC, DOCX, XLSX, PPTX, ZIP, RAR, ISO files are allowed.";
    $uploadOk = 0;
}

// Verifica se $uploadOk está definido como 0 por um erro
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// Se tudo estiver ok, tenta fazer o upload do arquivo
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<br><a href="index.php" style="text-decoration: none; color: #4CAF50;">Back to Home</a>
