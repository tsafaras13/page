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
					
	  
                                       <a href="insertanakoinwshfront.php">Εισαγωγή Ανακοίνωσης</a>
                                       <form>
										
										<select id="chosekath" size=9 name='onomateacher' onmouseup="myfunction()">									
										<option value="Παναγιώτης Φιλιππόπουλος">Παναγιώτης Φιλιππόπουλος</option>
										<option value="Ιωάννης Λιαπέρδος">Ιωάννης Λιαπέρδος</option>
										<option value="Παναγιώτης Κόκκινος">Παναγιώτης Κόκκινος</option>
										<option value="Βασίλης Πουλόπουλος">Βασίλης Πουλόπουλος</option>
										<option value="Σπυρίδων Χρονόπουλος">Σπυρίδων Χρονόπουλος</option>
										<option value="Στέφανος Ουγιάρογλου">Στέφανος Ουγιάρογλου</option>
										<option value="Αθανάσιος Παπαδημητρίου">Αθανάσιος Παπαδημητρίου</option>
										<option value="Κωσταντίνος Κουτράκης">Κωσταντίνος Κουτράκης</option>
										</select>
									</form>
									<div style ="border: 1px solid black; border-radius: 6px; padding:25px; margin-top:20px; text-align:left" id="resp"><b>Επιλέξτε καθηγητή για να δείτε τις ανακοινώσεις.</b></div>

									<script>
		xmlHttp = new XMLHttpRequest();
		function myfunction() 
		{
			var nameteacher = document.getElementById("chosekath").value;
				document.getElementById("resp").innerHTML = "";
				var url = "anakoinwshbackmathiti.php?nameteacher="+nameteacher;
				xmlHttp.open("GET", url, true);
				xmlHttp.onreadystatechange = function() 
				{
					setResult();
				}
				xmlHttp.send(null);
		}
		function setResult() 
		{
			if ((xmlHttp.readyState == 4) && (xmlHttp.status == 200)) 
			{
				var res = document.getElementById("resp");
				var response = xmlHttp.responseText;
				var resp = JSON.parse(response);
				res.innerHTML ="";
				if (resp[0] == null)
				{
					res.innerHTML = "<p><b>Δεν υπάρχουν ακόμα ανακοινώσεις</b></p>";
					return;
				}
				res.innerHTML += "<p><b>Όνομα: "+resp[0].nameteacher+"</b><p>";
				res.innerHTML += "<p><b>Ανακοινώσεις:</b></p>";
				for(i=0; i<resp.length; i++){
					res.innerHTML += "<p>"+resp[i].anakoinwsh+"<p></br>";
				}
			}
	}
</script>
									</body>
									</html>


