<?php

require 'DatabaseController.php';

$db = new DatabaseController();

if ($_GET['action'] == 'getHelp') {
  echo json_encode($db->getHelp());
}
else if ($_GET['action'] == 'createRecipient') {
  $db->createRecipient($_GET['recipient']);
}
else if ($_GET['action'] == 'createMessage') {
  $db->createMessage($_GET['message']);
}
else if ($_GET['action'] == 'getAllRecipients') {
  echo json_encode($db->getAllRecipients());
}
else if ($_GET['action'] == 'getAllMessages') {
  echo json_encode($db->getAllMessages());
}

?>



