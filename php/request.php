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
else if ($_GET['action'] == 'suggestRecipient') {
  $db->createRecipientSuggestion($_GET['recipient']);
}
else if ($_GET['action'] == 'suggestMessage') {
  $db->createMessageSuggestion($_GET['message']);
}
else if ($_GET['action'] == 'getAllSuggestionRecipients') {
  echo json_encode($db->getAllSuggestionRecipients());
}
else if ($_GET['action'] == 'getAllSuggestionMessages') {
  echo json_encode($db->getAllSuggestionMessages());
}
?>



