<?php

// Interface para Windows 10
interface Windows10Interface {
    public function abrirArchivoW10(string $archivo): string;
}

// Clase para Windows 7
class Windows7 {
    public function abrirArchivoW7(string $archivo): string {
        return "Archivo de Windows 7: $archivo abierto en formato antiguo";
    }
}

// Adapter para hacer compatible Windows 7 con Windows 10
class Windows7Adapter implements Windows10Interface {
    private $windows7;
    
    public function __construct(Windows7 $windows7) {
        $this->windows7 = $windows7;
    }
    
    public function abrirArchivoW10(string $archivo): string {
        // Convertir el formato del archivo
        $archivoConvertido = $this->windows7->abrirArchivoW7($archivo);
        return "Adaptado para Windows 10: " . $archivoConvertido;
    }
}

// Clase Windows 10
class Windows10 implements Windows10Interface {
    public function abrirArchivoW10(string $archivo): string {
        return "Archivo nativo de Windows 10: $archivo abierto";
    }
}

// Ejemplo de uso
$windows7 = new Windows7();
$adapter = new Windows7Adapter($windows7);
$windows10 = new Windows10();

// Abrir archivo en Windows 10 (nativo)
echo $windows10->abrirArchivoW10("documento.docx") . "\n";

// Abrir archivo de Windows 7 en Windows 10 (adaptado)
echo $adapter->abrirArchivoW10("documento_antiguo.doc") . "\n";