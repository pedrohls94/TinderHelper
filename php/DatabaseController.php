<?php

class DatabaseController {
		
	const TABLE_RECIPIENT = "Recipient";
	const RECIPIENT_COL_ID = "Id";
	const RECIPIENT_COL_DESCRIPTION = "Description";

	const TABLE_MESSAGE = "Message";
	const MESSAGE_COL_ID = "Id";
	const MESSAGE_COL_MESSAGE = "Message";

        const TABLE_RECIPIENT_SUGGESTION = "RecipientSuggestion";

        const TABLE_MESSAGE_SUGGESTION = "MessageSuggestion";

	const SERVERNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "icpedu";
	const DBNAME = "tinderhelper";

	function createRecipient($description) {
		$sql = 'INSERT INTO' . ' '.self::TABLE_RECIPIENT.' ';
		$sql .= '('.self::RECIPIENT_COL_DESCRIPTION.')';
		$sql .= ' VALUES ' . '('.$description.');';
	   	$this->processQuery($sql);
	}

        function createMessage($message) {
                $sql = 'INSERT INTO' . ' '.self::TABLE_MESSAGE.' ';
                $sql .= '('.self::MESSAGE_COL_MESSAGE.')';
                $sql .= ' VALUES ' . '('.$message.');';
                $this->processQuery($sql);         
        }

        function createRecipientSuggestion($description) {
                $sql = 'INSERT INTO' . ' '.self::TABLE_RECIPIENT_SUGGESTION.' ';
                $sql .= '('.self::RECIPIENT_COL_DESCRIPTION.')';
                $sql .= ' VALUES ' . '('.$description.');';
                $this->processQuery($sql);
        }

        function createMessageSuggestion($message) {
                $sql = 'INSERT INTO' . ' '.self::TABLE_MESSAGE_SUGGESTION.' ';
                $sql .= '('.self::MESSAGE_COL_MESSAGE.')';
                $sql .= ' VALUES ' . '('.$message.');';
                $this->processQuery($sql);
        }

	function getAllRecipients() {
                $sql = 'SELECT * FROM' . ' '.self::TABLE_RECIPIENT.';';
                $result = $this->processQuery($sql);
                $recipients = $this->rowsToArray($result, 'Description');
		return $recipients;
	}

        function getAllMessages() {
                $sql = 'SELECT * FROM' . ' '.self::TABLE_MESSAGE.';';
                $result = $this->processQuery($sql);
                $messages = $this->rowsToArray($result, 'Message');
		return $messages;
        }

        function getAllSuggestionRecipients() {
                $sql = 'SELECT * FROM' . ' '.self::TABLE_RECIPIENT_SUGGESTION.';';
                $result = $this->processQuery($sql);
                $recipients = $this->rowsToArray($result, 'Description');
                return $recipients;
        }

        function getAllSuggestionMessages() {
                $sql = 'SELECT * FROM' . ' '.self::TABLE_MESSAGE_SUGGESTION.';';
                $result = $this->processQuery($sql);
                $messages = $this->rowsToArray($result, 'Message');
                return $messages;
        }

	function getHelp() {
		$sql = 'SELECT * FROM' . ' '.self::TABLE_RECIPIENT.';';
		$result = $this->processQuery($sql);
		$recipients = $this->rowsToArray($result, 'Description');
                $sql = 'SELECT * FROM' . ' '.self::TABLE_MESSAGE.';';
                $result = $this->processQuery($sql);
                $messages = $this->rowsToArray($result, 'Message');

		$recipient = $recipients[array_rand($recipients)];
		$message = $messages[array_rand($messages)];

		$response = array( "recipient" => $recipient, "message" => $message );
		//$response = "Recipient: ".$recipient.PHP_EOL."Message: ".$message;

		return $response;
	}
	
    function rowsToArray($rows, $name) {
        $objects = array();
        if ($rows->num_rows > 0) {
	    	while($row = $rows->fetch_assoc()) {
    			$objects[] = $row[$name];
			}
		}
		return $objects;
    }
    
    function processQuery($sql) {
        $conn = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $result = $conn->query($sql);
        return $result;
    }

}

?>


