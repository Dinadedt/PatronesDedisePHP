<?php

// Interface para la estrategia de salida
interface OutputStrategy {
    public function mostrar(string $mensaje): void;
}

// Implementaciones concretas de las estrategias
class ConsolaOutput implements OutputStrategy {
    public function mostrar(string $mensaje): void {
        echo "Consola: $mensaje\n";
    }
}

class JsonOutput implements OutputStrategy {
    public function mostrar(string $mensaje): void {
        $data = ['mensaje' => $mensaje];
        echo "JSON: " . json_encode($data) . "\n";
    }
}

class ArchivoOutput implements OutputStrategy {
    private $archivo;
    
    public function __construct(string $nombreArchivo) {
        $this->archivo = $nombreArchivo;
    }
    
    public function mostrar(string $mensaje): void {
        file_put_contents($this->archivo, $mensaje . "\n", FILE_APPEND);
        echo "Mensaje guardado en archivo: " . $this->archivo . "\n";
    }
}

// Contexto que usa la estrategia
class MensajeContext {
    private $strategy;
    
    public function setStrategy(OutputStrategy $strategy): void {
        $this->strategy = $strategy;
    }
    
    public function mostrarMensaje(string $mensaje): void {
        $this->strategy->mostrar($mensaje);
    }
}

// Ejemplo de uso
$context = new MensajeContext();
$mensaje = "Hola, este es un mensaje de prueba";

// Usar diferentes estrategias
$context->setStrategy(new ConsolaOutput());
$context->mostrarMensaje($mensaje);

$context->setStrategy(new JsonOutput());
$context->mostrarMensaje($mensaje);

$context->setStrategy(new ArchivoOutput("salida.txt"));
$context->mostrarMensaje($mensaje);