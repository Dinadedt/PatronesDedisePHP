<?php

// Interfaz para los personajes
interface Personaje {
    public function atacar(): string;
    public function getVelocidad(): float;
}

// Implementación de Esqueleto
class Esqueleto implements Personaje {
    public function atacar(): string {
        return "Ataque de Esqueleto con huesos";
    }
    
    public function getVelocidad(): float {
        return 5.5;
    }
}

// Implementación de Zombi
class Zombi implements Personaje {
    public function atacar(): string {
        return "Ataque de Zombi con mordisco";
    }
    
    public function getVelocidad(): float {
        return 3.2;
    }
}

// Factory para crear personajes
class PersonajeFactory {
    public static function crearPersonaje(string $nivel): Personaje {
        switch ($nivel) {
            case 'facil':
                return new Esqueleto();
            case 'dificil':
                return new Zombi();
            default:
                throw new Exception("Nivel de juego no válido");
        }
    }
}

// Ejemplo de uso
function jugar(string $nivel) {
    try {
        $personaje = PersonajeFactory::crearPersonaje($nivel);
        echo "Nivel: $nivel\n";
        echo "Personaje creado: " . get_class($personaje) . "\n";
        echo "Ataque: " . $personaje->atacar() . "\n";
        echo "Velocidad: " . $personaje->getVelocidad() . "\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Demostración
jugar('facil');
echo "\n";
jugar('dificil');