<?php
if ($result) {
    $imagePath = $result['image_path'];

    $fullImagePath = __DIR__ . '/uploads/' . $imagePath;  // assuming uploads folder

    if (file_exists($fullImagePath)) {
        unlink($fullImagePath); 
    }
}
?>













