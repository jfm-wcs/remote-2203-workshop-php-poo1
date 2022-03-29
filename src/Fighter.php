<?php

/* Fighter class definition */

class Fighter
{
    public const MAX_LIFE = 100;
    private string $name;
    private int $strength;
    private int $dexterity;
    private int $life = self::MAX_LIFE;

    public function __construct(string $name, int $strength, int $dexterity)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
    }

    /**
     * Get the value of name
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of strength
     */ 
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * Get the value of dexterity
     */ 
    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    /**
     * Get the value of life
     */ 
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     * @return  self
     */ 
    public function setLife(int $life): self
    {
        $this->life = $life;

        return $this;
    }

    public function fight(Fighter $target): string
    {
        $strengthOfFight = rand(1, $this->strength);
        $damages = $strengthOfFight - $target->getDexterity();
        if ($damages < 0) {
            $damages = 0;
        }
        // $currentTargetLife = $target->getLife();
        // $newTargetLife = $currentTargetLife - $damages;
        // if ($newTargetLife < 0) {
        //     $newTargetLife = 0;
        // }
        // $target->setLife($newTargetLife);
        $target->setLife(($target->life - $damages) > 0 ? $target->getLife() - $damages : 0);
        return $this->getName() . " attaque 🗡  💙 " . $target->getName() . ": " . $target->getLife();
    }

    public function isAlive(): bool
    {
        // if ($this->life > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
        return $this->life > 0;
    }
}
