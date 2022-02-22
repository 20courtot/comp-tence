

<?php 
require('../assets/includes/bootstrap.php');
$auth = App::getAuth();
require_once('head.html')
?>
<body>
      
<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=competence;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>


<?php
$req = $bdd->prepare('UPDATE situation SET nom = :nv_nom WHERE nom = :ancien_nom');
$req->execute(array(
  'ancien_nom' => $_POST['nom_ancien'],
  'nv_nom' => $_POST['nom_nv']

  ));
?>

<?php
$req = $bdd->prepare('UPDATE situation SET date_debut = :nv_date WHERE date_debut = :ancien_date');
$req->execute(array(

  'ancien_date' => $_POST['date_ancien'],
  'nv_date' => $_POST['date_nv']

  ));
?>

<?php
$req = $bdd->prepare('UPDATE situation SET details = :nv_details WHERE details = :ancien_details');
$req->execute(array(

'ancien_details' => $_POST['details_situation_ancien'],
  'nv_details' => $_POST['details_situation_nv']

  ));
?>

<?php
$req = $bdd->prepare('UPDATE situation SET duree = :nv_duree WHERE duree = :ancien_duree');
$req->execute(array(

  'ancien_duree' => $_POST['duree_ancien'],
  'nv_duree' => $_POST['duree_nv']

  ));

?>




<div id="box">

  <div class="gauche">
    <div class="insidebox">
    <?php
      require_once('menuG.php');
    ?>
</div>
</div>
<div class="droite">
<div class="insidebox">
<form  method="post" >  

          
            <p>

            <table>

            <tr> <td> <h3> Ancien Formulaire </h3> </td> </tr>
            
            <tr> <td> <input type="text" placeholder="ancien nom" name="nom_ancien" /> </td> </tr>
            
              <tr> <td> <label for="start">Ancienne Date : </label>

                    <input type="date" id="start" name="date_ancien"
                        value=""
                        min="" max=""> </td> </tr>

         
    
            <tr> <td>  <input type="text" placeholder="anciens details" name="details_situation_ancien" />  </td> </tr>
            


            <tr> <td> <input type="text" placeholder="ancienne durée" name="duree_ancien" /> </td> </tr>
             
   
            
            </table>
            

          <br><br>
            
            <table>

              <tr> <td> <h3> Nouveau Formulaire </h3> </td> </tr>

            <tr> <td> <input type="text" placeholder="nouveau nom" name="nom_nv" /> </td> </tr>



            <tr> <td> <label for="start">Nouvelle Date : </label>

                    <input type="date" id="start" name="date_nv"
                        value=""
                        min="" max=""> </td> </tr>

       
            <tr> <td> <input type="text" placeholder="nouveaux details" name="details_situation_nv" /> </td> </tr>


            <tr> <td><input type="text" placeholder="nouvelle durée" name="duree_nv" /> </td> </tr>

 
            </table>


            <br><br>
            <input type="submit" value="Valider_modif" />

          </p>

          


        </form>
        
<h4>Liste des Situations</h4> 

<?php

$reponse = $bdd->query('SELECT nom, date_debut, details, duree FROM situation'); 

while ($donnees = $reponse->fetch())
{
    echo $donnees['nom'] . ', ' . $donnees['date_debut'] . ', ' .  $donnees['details'] . ', ' . $donnees['duree'] . '<br>';
}

$reponse->closeCursor();

?>


</div>
</div> 
 </div>
 </div>
 </div>






  
</body>
</html>
