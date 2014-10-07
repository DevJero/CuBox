<?php

require 'pushbullet.php';

try {
  #### AUTHENTICATION ####
  // Get your API key here: https://www.pushbullet.com/account
  $p = new PushBullet('v1pAxW812rygFz1LGah8McTV5Pb5IlZ5qNujAmPyZyvC0');

  // Print the definitions for your own devices. Useful for getting the 'iden' for using with the push methods.
  print_r($p->getDevices());

  $p->pushNote('', 'Some title', 'Some text');

} catch (PushBulletException $e) {
  // Exception handling
  die($e->getMessage());
}

?>