<?php

// Interface base para personajes
interface PersonajeJuego {
    public function atacar(): string;
    public function getDescripcion(): string;
}

// Personajes base
class Guerrero implements PersonajeJuego {
    public function atacar(): string {
        return "10 puntos de daño";
    }
    
    public function getDescripcion(): string {
        return "Guerrero";
    }
}

class Mago implements PersonajeJuego {
    public function atacar(): string {
        return "8 puntos de daño";
    }
    
    public function getDescripcion(): string {
        return "Mago";
    }
}

// Decorator base
abstract class ArmaDecorator implements PersonajeJuego {
    protected $personaje;
    
    public function __construct(PersonajeJuego $personaje) {
        $this->personaje = $personaje;
    }
}

// Decoradores concretos
class EspadaDecorator extends ArmaDecorator {
    public function atacar(): string {
        return $this->personaje->atacar() . " + 5 daño de espada";
    }
    
    public function getDescripcion(): string {
        return $this->personaje->getDescripcion() . " con Espada";
    }
}

class VaritaDecorator extends ArmaDecorator {
    public function atacar(): string {
        return $this->personaje->atacar() . " + 3 daño mágico";
    }
    
    public function getDescripcion(): string {
        return $this->personaje->getDescripcion() . " con Varita";
    }
}

// Ejemplo de uso
$guerrero = new Guerrero();
$guerreroConEspada = new EspadaDecorator($guerrero);

$mago = new Mago();
$magoConVarita = new VaritaDecorator($mago);

echo $guerreroConEspada->getDescripcion() . ": " . $guerreroConEspada->atacar() . "\n";
echo $magoConVarita->getDescripcion() . ": " . $magoConVarita->atacar() . "\n";