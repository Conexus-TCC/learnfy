<?php
// helpers/geticons.php

function getFileIcon($fileType) {
  // Associative array mapping file types to Material Design Icons
  $icons = [
    'pdf' => 'mdi-file-pdf-box',
    'doc' => 'mdi-file-word-box',
    'docx' => 'mdi-file-word-box',
    'xls' => 'mdi-file-excel-box',
    'xlsx' => 'mdi-file-excel-box',
    'ppt' => 'mdi-file-powerpoint-box',
    'pptx' => 'mdi-file-powerpoint-box',
    'txt' => 'mdi-file-document-outline',
    'jpg' => 'mdi-file-image',
    'jpeg' => 'mdi-file-image',
    'png' => 'mdi-file-image',
    'gif' => 'mdi-file-image',
    'zip' => 'mdi-folder-zip',
    'rar' => 'mdi-folder-zip',
    'mp3' => 'mdi-file-music',
    'wav' => 'mdi-file-music',
    'mp4' => 'mdi-file-video',
    'avi' => 'mdi-file-video',
    'html' => 'mdi-language-html5',
    'css' => 'mdi-language-css3',
    'js' => 'mdi-nodejs',
    'php' => 'mdi-language-php',
    'default' => 'mdi-file',
  ];

  // Return the corresponding icon or the default icon
  return $icons[strtolower($fileType)] ?? $icons['default'];
}

// Example usage
function getFileDescription($fileType) {
  // Associative array mapping file types to descriptions
  $descriptions = [
    'pdf' => 'Documento PDF',
    'doc' => 'Documento Word',
    'docx' => 'Documento Word',
    'xls' => 'Planilha Excel',
    'xlsx' => 'Planilha Excel',
    'ppt' => 'Apresentação PowerPoint',
    'pptx' => 'Apresentação PowerPoint',
    'txt' => 'Arquivo de Texto',
    'jpg' => 'Imagem JPG',
    'jpeg' => 'Imagem JPEG',
    'png' => 'Imagem PNG',
    'gif' => 'Imagem GIF',
    'zip' => 'Arquivo Compactado ZIP',
    'rar' => 'Arquivo Compactado RAR',
    'mp3' => 'Arquivo de Áudio MP3',
    'wav' => 'Arquivo de Áudio WAV',
    'mp4' => 'Arquivo de Vídeo MP4',
    'avi' => 'Arquivo de Vídeo AVI',
    'html' => 'Arquivo HTML',
    'css' => 'Arquivo CSS',
    'js' => 'Arquivo JavaScript',
    'php' => 'Arquivo PHP',
    'default' => 'Arquivo Padrão',
  ];

  // Return the corresponding description or the default description
  return $descriptions[strtolower($fileType)] ?? $descriptions['default'];
}

// Example usage

?>