<?php 
	require_once("includes/Functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Rendez_vous</title><!-- todo change title when press next document.title = 'test'; -->
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/jquery.timepicker.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- multistep form -->
<form id="msform" method="POST" action="Resultat.php">
	<div class="container">
	<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
			<div class="form-group">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">Patient</li>
				<li>Specialité</li>
				<li>Service</li>
				<li>Rendez Vous</li>
			</ul>
		</div>
	<!-- fieldsets -->
	<fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Registre Patient</div>
		<div class="panel-body">
		
		<div class="form-group">
			<div class="col-lg-12">
				<input type="text" name="cin"  id="cin" class="form-control" placeholder="Cin" required />
			</div>
		</div>
  
		<div class="form-group">
			<div class="col-lg-12">
				<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required />
			</div>
		</div>  
	
		<div class="form-group">
			<div class="col-lg-12">
				<input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom" required />
			</div>
		</div>  
		
		<div class="form-group">
			<div class="col-lg-12">
				<input type="date" name="dateN" id="dateN" class="form-control" placeholder="Date de naissance" required />
			</div>
		</div>  
		
		<div class="form-group">
			<div class="col-lg-12">
				<input type="text" name="tel" id="tel" class="form-control"  placeholder="Tel" required />
			</div>
		</div>    
		
		<div class="form-group">
			<div class="col-lg-12">
				<input type="text" name="adresse" id="adresse" class="form-control"  placeholder="Adresse" required />
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-offset-5">
			  <input type="button" name="ajouter" value="Ajouter" onclick="addPatient()" class="btn btn-primary"/>  <input type="reset" value="Vider" class="btn btn-danger"/>
			</div>
		</div>
		<div class="form-group">
			<table class="table table-hover">
				<tr><th>Cin</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Tel</th><th>Adresse</th><th>#</th></tr>
				<?php 
				$result = getPatient();
					while($tab=mysqli_fetch_array($result)){
					   echo "<tr class='success' onclick='fill(".json_encode($tab).")'><td>".$tab['cin']."</td>cin<td>".$tab['nom']."</td>nom<td>".$tab['prenom']."</td>prenom<td>".$tab['date_n']."</td>date_n<td>".$tab['tel']."</td>tel<td>".$tab['adresse']."</td>adresse<td><a href='SupprimerPatient.php?cin=".$tab['cin']."'>Supprimer</a></td></tr>";
					}
				?>
			</table>
		</div>
		<div class="form-group">
			<div class="col-lg-6 col-lg-offset-5">	  
				<input type="button" name="next" class="next action-button" value="Next" />
			</div>
		</div>
		</div>
	</fieldset>
	<fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Choisir une spécialité</div>
		<div class="panel-body">
			<div class="form-group">
			<div class="col-lg-6 col-lg-offset-3">
				
            <select name="specialité" id="specialité">
                <option value="none">Sélectionnez votre le specialité</option>
                <option value="en">Immunologie</option>
                <option value="us">Cardiologie</option>
                <option value="fr">Pédiatrie</option>
                <option value="fr">Dermatologie</option>
                <option value="fr">gynécologie</option>
            </select> <br>
			</div>
			</div>
			
		<div class="form-group">
			<div class="col-lg-8 col-lg-offset-4">
				<input type="button" name="previous" class="previous action-button" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next" />  
			</div>
		</div>
		</div>
	</fieldset>
	<fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Service</div>
		<div class="panel-body">
		<div class="form-group">
			<div class="col-lg-8 col-lg-offset-4">
			  <div id="datepicker"></div>
			  <select name="specialité" id="specialité">
                <option value="none">Sélectionnez votre service</option>
                <option value="en">Hospitalisation</option>
                <option value="us">Chirurgie</option>
                <option value="fr">Femme/Enfant</option>
                <option value="fr">Geneatrie</option>
                <option value="fr">Consultation</option>
            </select> <br>
			</div>
		</div>	
		   
		<div class="form-group">
			<div class="col-lg-8 col-lg-offset-4">
				<input type="button" name="previous" class="previous action-button" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next" />  
			</div>
		</div>
		</div>
	</fieldset>
	<fieldset class="panel panel-info form-horizontal">
		<div class="panel-heading">Choisir un Rendez Vous</div>
		<div class="panel-body">
		<div class="form-group">
			<div class="col-lg-8 col-lg-offset-4">
			  <div id="datepicker"></div>
			</div>
		</div>		
		<div class="form-group">
			<div class="col-lg-8">
            <label class="form_col" for="jour">jour rv:</label>

<select name="jour" id="jour">
    <option value="none">Sélectionnez un jour</option>
    <option value="en">Lundi</option>
    <option value="us">Mardi</option>
    <option value="fr">Mercredi</option>
    <option value="fr">Jeudi</option>
    <option value="fr">Vendredi</option>
    <option value="fr">Samedi</option>
</select> <br>
			</div>
		</div>		
        <label class="form_col" for="heure">heure rv:</label>

<select name="heure" id="heure">
    <option value="none">Sélectionnez votre l'heure</option>
    <option value="en">8h/12h</option>
    <option value="us">15h/17h</option>
</select> <br>

<span class="form_colspan>
<input type="submit" value="Prendre RV" /> 
<p>NB:Les rendez-vous durent 15minutes et sont gérés selon le planning des medecins</p>

		</div>
		<div class="form-group">
			<div class="col-lg-8 col-lg-offset-4">	
				<input type="button" name="previous" class="previous action-button" value="Previous" />  <input type="button" name="envoyer" class="next action-button" value="Envoyer" /> </p>  
			</div>
		</div>
		</div>
	</fieldset>
	</div>
	</div>
	</div>
</form>
</body>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/datepicker-fr.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/jquery.easing.min.js" type="text/javascript"></script>
    <script  src="js/index.js"></script>
    <script  src="js/main.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		getDateRdv(); //get rdv depending on speciality with ajax & update calendar
	</script>
<html>
