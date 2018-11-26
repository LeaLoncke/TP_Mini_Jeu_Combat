<?php

class PersonnageManager {

  // Attribute
  private $_db;

  // Constructor
  public function __construct(PDO $db) {
    $this->setDb($db);
  }

  // Setter
  public function setDb(PDO $db) {
    $this->_db = $db;
    return $this;
  }

  // Getter
  public function getDb() {
    return $this->_db;
  }

  // Others functions
  public function addPersonnage(Personnage $personnage) {
    $query = $this->getDb()->prepare('INSERT INTO personnages(name) VALUES (:name)'); // Id: auto-increment & Damage: 0 (automatic)
    $query->execute([
      "name" => $personnage->getName()
    ]);
  }

  public function getPersonnages(){
    $arrayOfPersonnages = [];

    $query = $this->getDb()->query('SELECT * FROM personnages');
    $personnages = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($personnages as $personnage) {
      $arrayOfPersonnages[] = new Personnage($personnage);
    }

    return $arrayOfPersonnages;
  }

  public function increaseTheDamageOfPersonnage(Personnage $personnage) {
    $newDamage = $personnage->getDamage() + 5;
    $query = $this->getDb()->prepare('UPDATE personnages SET damage = :damage WHERE id = :id');
    $query->execute([
      "id" => $personnage->getId(),
      "damage" => $newDamage
    ]);
  }

  public function deletePersonnage(Personnage $personnage) {
    $query = $this->getDb()->prepare('DELETE FROM personnages WHERE id = :id'); // Do not forget the WHERE otherwise the table "personnages" will be emptied !!
    $query->execute([
      "id" => $personnage->getId()
    ]);
  }


} // End of the class
