$('document').ready(function(){
    document.getElementById("defaultOpen").click();
});

function createRecipient() {
    var name = $('input:text[name="name"]').val();
    $.get('/php/request.php?action=createRecipient&recipient="' + name + '"', function(data, status){
      alert('Salvo!');
    });
}

function createMessage() {
    var name = $('input:text[name="message"]').val();
    $.get('/php/request.php?action=createMessage&message="' + name + '"', function(data, status){
      alert('Salvo!');
    });
}

function suggestRecipient() {
    var name = $('input:text[name="name"]').val();
    $.get('/php/request.php?action=suggestRecipient&recipient="' + name + '"', function(data, status){
      alert('Sugestao Salva!');
    });
}

function suggestMessage() {
    var name = $('input:text[name="message"]').val();
    $.get('/php/request.php?action=suggestMessage&message="' + name + '"', function(data, status){
      alert('Sugestao Salva!');
    });
}

function getHelp() {
    $.get("/php/request.php?action=getHelp", function(data, status){
        if(JSON.parse(data) == null) {
            alert("That's not your lucky day, try again later.");
        } else {
            var rand = JSON.parse(data);
	    document.getElementById('responseRecipient').innerHTML = rand['recipient'];
            document.getElementById('responseMessage').innerHTML = rand['message'];
        }
    });
}

function getAllFromDb() {
    $.get("/php/request.php?action=getAllMessages", function(data, status){
        if(JSON.parse(data) == null) {
            alert("That's not your lucky day, try again later.");
        } else {
            var dbData = JSON.parse(data);
	    var string = "";
	    for(key in dbData) {
		string += dbData[key] + "<br><br>";
	    }
	    document.getElementById('dbMessages').innerHTML = string;
        }
    });
    $.get("/php/request.php?action=getAllRecipients", function(data, status){
        if(JSON.parse(data) == null) {
            alert("That's not your lucky day, try again later.");
        } else {
            var dbData = JSON.parse(data);
            var string = "";
            for(key in dbData) {
                string += dbData[key] + "<br><br>";
            }
            document.getElementById('dbRecipients').innerHTML = string;
        }
    });
}

function getAllSuggestionsFromDb() {
    $.get("/php/request.php?action=getAllSuggestionMessages", function(data, status){
        if(JSON.parse(data) == null) {
            alert("That's not your lucky day, try again later.");
        } else {
            var dbData = JSON.parse(data);
            var string = "";
            for(key in dbData) {
                string += dbData[key] + "<br><br>";
            }
            document.getElementById('dbSuggestionMessages').innerHTML = string;
        }
    });
    $.get("/php/request.php?action=getAllSuggestionRecipients", function(data, status){
        if(JSON.parse(data) == null) {
            alert("That's not your lucky day, try again later.");
        } else {
            var dbData = JSON.parse(data);
            var string = "";
            for(key in dbData) {
                string += dbData[key] + "<br><br>";
            }
            document.getElementById('dbSuggestionRecipients').innerHTML = string;
        }
    });
}

function changeTab(evt, tabName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
