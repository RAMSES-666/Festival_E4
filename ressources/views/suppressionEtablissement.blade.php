<title>Acceuil > Gestion √©tablissements > Suppression √©tablissements</title>


@include("debut")
@foreach ($reqNom as $reqNomData)
<?php
$nom = ($reqNomData->nom);
$id = ($reqNomData->idEtablissement);
?>
@endforeach
<?php

?>

<br><center><h5>Souhaitez-vous vraiment supprimer l'√©tablissement {{$nom}} ?
<br><br>
<a href='SuppressionExec?idEtablissement={{$id}}'>
Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
<a href='GestionEtablissement'>Non</a></h5></center>



