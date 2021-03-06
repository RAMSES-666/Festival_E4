<title>Acceuil > Attribution chambres > Modification Attribution</title>
<?php echo $__env->make('debut', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<table align='center' width='85%'>
    <tr>
        <td width='34%' align='left'><a href='AttributionChambres'>Retour</a>
        </td>
    </tr>
</table>
<br>
<div class='mx-auto' style='width: 1200px;'>
    <table class='table table-bordered' width='80%' cellspacing='0' cellpadding='0' align='center' class='tabQuadrille'>
        <tr class='enTeteTabQuad'>
            <td colspan='2' style=text-align:center>
                <h4><strong>Attributions</strong></h4>
            </td>
         </tr>
         <tr class='ligneTabQuad'>
            <td><i><strong>Nom équipes et pays équipes</strong></i></td>
            <td valign='top' width='$pourcCol%'>
                <i><strong>Disponibilités : <!-- $nbChLib --> </i></strong><br>
            </td>
        </tr>
        <tr>
            <?php $__currentLoopData = $reqModif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqModifData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td>
            <td width='60%' align='left'><strong><?php echo e($reqModifData->idEquipe); ?></strong></td>
            </td>
            <td>
                <?php $__currentLoopData = $Equipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EquipeData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value= "<?php echo e($EquipeData->idE); ?>" ><?php echo e($EquipeData->nom); ?> - <?php echo e($EquipeData->nomPays); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>


<?php
// // EFFECTUER OU MODIFIER LES ATTRIBUTIONS POUR L'ENSEMBLE DES ÉTABLISSEMENTS

// // CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ DE 2 LIGNES D'EN-TÊTE (LIGNE TITRE ET
// // LIGNE ÉTABLISSEMENTS) ET DU DÉTAIL DES ATTRIBUTIONS
// // UNE LÉGENDE FIGURE SOUS LE TABLEAU

// // Recherche du nombre d'établissements offrant des chambres pour le
// // dimensionnement des colonnes
// $nbEtabOffrantChambres=obtenirNbEtabOffrantChambres($connexion);
// $nb=$nbEtabOffrantChambres+2;
// // Détermination du pourcentage de largeur des colonnes "établissements"
// $pourcCol=50/$nbEtabOffrantChambres;

// $action=$_REQUEST['action'];

// // Si l'action est validerModifAttrib (cas où l'on vient de la page
// // donnerNbChambres.php) alors on effectue la mise à jour des attributions dans
// // la base
// if ($action=='validerModifAttrib')
// {
//    $idEtab=$_REQUEST['idEtab'];
//    $idEquipe=$_REQUEST['idEquipe'];
//    $nbChambres=$_REQUEST['nbChambres'];
//    modifierAttribChamb($connexion, $idEtab, $idEquipe, $nbChambres);
// }
// echo "
// <table align='center' width='85%'>
//     <tr>
//         <td width='34%' align='left'><a href='consultationAttributions.php'>Retour</a>
//         </td>
//     </tr>
// </table>
// <br>
// <div class='mx-auto' style='width: 1200px;'>
// <table class='table table-bordered' width='80%' cellspacing='0' cellpadding='0' align='center'
// class='tabQuadrille'>";

//    // AFFICHAGE DE LA 1ÈRE LIGNE D'EN-TÊTE
//    echo "
//    <tr class='enTeteTabQuad'>
//       <td colspan=$nb $align
//    ><strong>Attributions</strong></td>
//    </tr>";

//    // AFFICHAGE DE LA 2ÈME LIGNE D'EN-TÊTE (ÉTABLISSEMENTS)
//    echo "
//    <tr class='ligneTabQuad'>
//       <td><i><strong>Nom équipes et pays équipes</strong></i></td>";

//    $req=obtenirReqEtablissementsOffrantChambres();
//    $rsEtab=$connexion->query($req);
//    $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);

//    // Boucle sur les établissements (pour afficher le nom de l'établissement et
//    // le nombre de chambres encore disponibles)
//    while ($lgEtab!=FALSE)
//    {
//       $idEtab=$lgEtab["idEtablissement"];
//       $nom=$lgEtab["nom"];
//       $nbOffre=$lgEtab["nombreChambresOffertes"];
//       $nbOccup=obtenirNbOccup($connexion, $idEtab);
//       // Calcul du nombre de chambres libres
//       $nbChLib = $nbOffre - $nbOccup;
//       echo "
//       <td valign='top' width='$pourcCol%'><i>Disponibilités : $nbChLib </i> <br>
//       $nom </td>";
//       $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
//    }
//    echo "<td valign='top' width='7%'><i> Résevations totales <br> pour chaque équipes</i></td>
//    </tr>";

//    // CORPS DU TABLEAU : CONSTITUTION D'UNE LIGNE PAR GROUPE À HÉBERGER AVEC LES
//    // CHAMBRES ATTRIBUÉES ET LES LIENS POUR EFFECTUER OU MODIFIER LES ATTRIBUTIONS

//    $req=obtenirReqIdNomEquipeAHeberger();
//    $rsEquipe=$connexion->query($req);
//    $lgEquipe=$rsEquipe->fetch(PDO::FETCH_ASSOC);

//    // BOUCLE SUR LES GROUPES À HÉBERGER
//    while ($lgEquipe!=FALSE)
//    {
//       $idEquipe=$lgEquipe['idE'];
//       $nom=$lgEquipe['nom'];
//       $paysEquipe=$lgEquipe['nomPays'];
//       echo "
//       <tr class='ligneTabQuad'>
//          <td width='25%'> <strong>$nom</strong> - $paysEquipe</td>";
//       $req=obtenirReqEtablissementsOffrantChambres();
//       $rsEtab=$connexion->query($req);
//       $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);

//       // BOUCLE SUR LES ÉTABLISSEMENTS
//       while ($lgEtab!=FALSE)
//       {
//          $idEtab=$lgEtab["idEtablissement"];
//          $nbOffre=$lgEtab["nombreChambresOffertes"];
//          $nbOccup=obtenirNbOccup($connexion, $idEtab);

//          // Calcul du nombre de chambres libres
//          $nbChLib = $nbOffre - $nbOccup;

//          // On recherche si des chambres ont déjà été attribuées à ce groupe
//          // dans cet établissement
//          $nbOccupEquipe=obtenirNbOccupEquipe($connexion, $idEtab, $idEquipe);

//          // Cas où des chambres ont déjà été attribuées à ce groupe dans cet
//          // établissement
//          if ($nbOccupEquipe!=0)
//          {
//             // Le nombre de chambres maximum pouvant être demandées est la somme
//             // du nombre de chambres libres et du nombre de chambres actuellement
//             // attribuées au groupe (ce nombre $nbmax sera transmis si on
//             // choisit de modifier le nombre de chambres)
//             $nbMax = $nbChLib + $nbOccupEquipe;
//             echo "
//             <td class='reserve'>
//             <a href='donnerNbChambres.php?idEtab=$idEtab&amp;idEquipe=$idEquipe&amp;nbChambres=$nbMax'>
//             $nbOccupEquipe</a></td>";
//          }
//          else
//          {
//             // Cas où il n'y a pas de chambres attribuées à ce groupe dans cet
//             // établissement : on affiche un lien vers donnerNbChambres s'il y a
//             // des chambres libres sinon rien n'est affiché
//             if ($nbChLib != 0)
//             {
//                echo "
//                <td class='reserveSiLien'>
//                <a href='donnerNbChambres.php?idEtab=$idEtab&amp;idEquipe=$idEquipe&amp;nbChambres=$nbChLib'>
//                __</a></td>";
//             }
//             else
//             {
//                echo "<td class='reserveSiLien'>&nbsp;</td>";
//             }
//          }
//          $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
//       } // Fin de la boucle sur les établissements
//       $lgEquipe=$rsEquipe->fetch(PDO::FETCH_ASSOC);
//       $nbOccupTotal=obtenirNbOccupEquipeTotal($connexion,$idEquipe);
//       $nbOccupTotal=$connexion->query($nbOccupTotal);
//       $nbOccupTotal=$nbOccupTotal->fetch(PDO::FETCH_ASSOC);
//       $nbOccupParEquipe=$nbOccupTotal['reservations'];
//       if($nbOccupParEquipe == 0)
//       {
//          echo"<td> Aucune réservations effectuées</td>";
//       }
//       else
//       {
//          echo"<td> $nbOccupParEquipe</td>";
//       }
//    } // Fin de la boucle sur les groupes à héberger
// echo "
// </div>
// </table>"; // Fin du tableau principal
?>
<?php /**PATH /home/user/Festival/resources/views/modificationAttributions.blade.php ENDPATH**/ ?>