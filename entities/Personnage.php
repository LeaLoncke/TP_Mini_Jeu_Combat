<?php

class Personnage {

  // Attributes
  protected $id,
            $name,
            $damage;

  // Constructor
  public function __construct(array $array) {
    $this->hydrate($array);
  }

  // Hydratation
  public function hydrate(array $donnees) {

    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  // Setters
  public function setId(int $id) {
    $id = (int) $id;
    $this->id = $id;
    return $this;
  }

  public function setName(string $name) {
    $this->name = $name;
    return $this;
  }

  public function setDamage(int $damage) {
    $this->damage = $damage;
    return $this;
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getDamage() {
    return $this->damage;
  }


} // End of the class
