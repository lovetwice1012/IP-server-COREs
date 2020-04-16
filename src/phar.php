<?php
 ini_set('phar.readonly','0');
?>
  <?php
// The php.ini setting phar.readonly must be set to 0
$pharFile = 'PocketMine-MP.phar';

// clean up
if (file_exists($pharFile)) {
    unlink($pharFile);
}
if (file_exists($pharFile . '.gz')) {
    unlink($pharFile . '.gz');
}

// create phar
$p = new Phar($pharFile);

// creating our library using whole directory  
$p->buildFromDirectory('pocketmine/');

// pointing main file which requires all classes  
$p->setDefaultStub('server.php', 'pocketmine/server.php');

// plus - compressing it into gzip  
$p->compress(Phar::GZ);
   
echo "$pharFile successfully created";