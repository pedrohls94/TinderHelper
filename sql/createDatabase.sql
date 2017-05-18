CREATE TABLE Recipient (Id SERIAL NOT NULL, Description varchar(255) NOT NULL, PRIMARY KEY (Id));
CREATE TABLE Message (Id SERIAL NOT NULL, Message varchar(255) NOT NULL, PRIMARY KEY (Id));
CREATE TABLE RecipientSuggestion (Id SERIAL NOT NULL, Description varchar(255) NOT NULL, PRIMARY KEY (Id));
CREATE TABLE MessageSuggestion (Id SERIAL NOT NULL, Message varchar(255) NOT NULL, PRIMARY KEY (Id));
