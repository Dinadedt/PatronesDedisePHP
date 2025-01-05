<?php

// Interfaz para los personajes
interface Personaje {
    public function atacar(): string;
    public function getVelocidad(): int;
}

// Clase Esqueleto
class Esqueleto implements Personaje {
    public function atacar(): string {
        return "El esqueleto ataca con su arco y flecha";
    }
    
    public function getVelocidad(): int {
        return 5;
    }
}

// Clase Zombi
class Zombi implements Personaje {
    public function atacar(): string {
        return "El zombi ataca mordiendo";
    }
    
    public function getVelocidad(): int {
        return 3;
    }
}

// Factory de personajes
class PersonajeFactory {
    public function crearPersonaje(string $nivel): Personaje {
        switch ($nivel) {
            case 'facil':
                return new Esqueleto();
            case 'dificil':
                return new Zombi();
            default:
                throw new Exception("Nivel no válido");
        }
    }
}

// Ejemplo de uso
$factory = new PersonajeFactory();

$personajeFacil = $factory->crearPersonaje('facil');
$personajeDificil = $factory->crearPersonaje('dificil');

echo $personajeFacil->atacar() . "\n";
echo "Velocidad: " . $personajeFacil->getVelocidad() . "\n";
echo $personajeDificil->atacar() . "\n";
echo "Velocidad: " . $personajeDificil->getVelocidad() . "\n";