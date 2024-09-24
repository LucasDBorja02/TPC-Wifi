<?php
$allowedTypes = array(
    'image/jpeg', 
    'image/png', 
    'image/gif', 
    'application/pdf', 
    'text/csv', 
    'application/vnd.ms-excel', 
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
    'application/msword', 
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
    'application/vnd.ms-powerpoint', 
    'application/vnd.openxmlformats-officedocument.presentationml.presentation', 
    'application/zip', 
    'application/x-rar-compressed', 
    'application/x-iso9660-image'
);

if (!in_array($_FILES['fileToUpload']['type'], $allowedTypes)) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, CSV, Excel, Word, PowerPoint, ZIP, RAR, ISO files are allowed.";
    exit();
}
?>
