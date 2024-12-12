<?php

// Interfaz para archivos de Windows 10
interface Windows10File {
    public function abrirArchivoWindows10(): string;
}

// Clase para archivos de Windows 7 (incompatible)
class Windows7File {
    public function abrirArchivoWindows7(): string {
        return "Archivo de Windows 7 original";
    }
}

// Adapter para hacer compatibles los archivos de Windows 7 con Windows 10
class FileAdapter implements Windows10File {
    private $windows7File;

    public function __construct(Windows7File $windows7File) {
        $this->windows7File = $windows7File;
    }

    public function abrirArchivoWindows10(): string {
        // Convertir el archivo de Windows 7 para que sea compatible con Windows 10
        return "Archivo convertido: " . $this->windows7File->abrirArchivoWindows7();
    }
}

// Cliente que trabaja con archivos de Windows 10
class SistemaWindows10 {
    public function abrirArchivo(Windows10File $file): void {
        echo $file->abrirArchivoWindows10() . "\n";
    }
}

// Demostración
$sistemaWindows10 = new SistemaWindows10();

// Archivo de Windows 7 original
$archivoWindows7 = new Windows7File();

// Adapter para hacer compatible el archivo
$adaptedFile = new FileAdapter($archivoWindows7);

// Abrir archivo en Windows 10
$sistemaWindows10->abrirArchivo($adaptedFile);