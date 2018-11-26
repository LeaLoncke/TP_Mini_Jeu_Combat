<?php
  include("template/header.php");


  foreach($personnages as $personnage) {
    ?>
    <p>Id : <?php echo $personnage->getId(); ?></p>
    <p>Name : <?php echo $personnage->getName(); ?></p>
    <p>Damage : <?php echo $personnage->getDamage(); ?></p>
    <?php
  }


   include("template/footer.php");
  ?>
