<?php

session_start();
if(!isset($_SESSION['username'])){
      header("location:login.html");
      die();
   } 
   
print "hello $_SESSION[username].";
?>
<html>
  <head>
   <meta charset="UTF-8">
   <title> Πανεπιστήμιο Πελοποννήσου(Εγγραφή) </title>
    <link href="css/styles-index.css" rel="stylesheet" />

  <style>        
	   body {          
		     font-family:Arial, Helvetica, sans-serif;    
		                 font-size:16px;         }        
	  label {            font-weight:bold;    
		                 width:100px;  
			             font-size:15px;      
			             color:white;   }  
		.box {           border:#666666 solid 1px;         }     
	   
	    </style>
	    <script>	
function getFocus(obj){	
	obj.style.backgroundColor ="yellow"
}

function looseFocus(obj){
	if (obj.value.length == 0){		
		obj.style.backgroundColor ="red";
	}
	else{
		obj.style.backgroundColor ="white"
	}
}
</script>
   </head>
   
 <body id="page-top">
	 <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
						<li class="nav-item"><a class="nav-link" href="index.html"><u>Αρχική</u></a></li>
                        <li class="nav-item"><a class="nav-link" href="λιστα καθηγητων.html"><u>Λίστα Καθηγητών</u></a></li> 
                        <li class="nav-item"><a class="nav-link" href="επικοινωνια.html"><u>Επικοινωνία</u></a></li>
                         <li class="nav-item"><a class="nav-link" href="session.php"><u>Έξοδος χρήστη</u></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
					
	                                 <div>
                                    Όνομα Καθηγητή: <input id=textam type='text' name='nameteacher' ></div>
                                    Ανακοίνωση:  <textarea id="textemail" name="anakoinwsh" rows="4" cols="50"></textarea>
                                    <div>   <input type="button" value="Εισαγωγή ανακοίνωσης" onclick="getResult();"></div>
								<script>
xmlHttp = new XMLHttpRequest();
function getResult() {
	var nameteacher = document.getElementById("textam").value;	
	var anakoinwsh = document.getElementById("textemail").value;		
	xmlHttp.open("POST", "insertanakoinwseisback.php", true);				
	xmlHttp.onreadystatechange = function() {setResult();};
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");								     
	xmlHttp.send("&nameteacher="+nameteacher+"&anakoinwsh="+anakoinwsh);		
}
function setResult() {
	if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
		var response = xmlHttp.responseText;
		var resp = JSON.parse(response);																										
		if (resp.status == "ERROR"){
			alert("Something goes wrong!");
		}
		else if (resp.status == "OK"){
			alert("A record was entered");											
			document.getElementById("textam").value="";
			document.getElementById("textemail").value="";
			
		}
	}
}
</script>
	</body>
									</html>


