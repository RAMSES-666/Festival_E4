<title>Acceuil > Attribution chambres</title>
<?php echo $__env->make("debut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$id = NULL;
$NBChambres = 'select sum(nombreChambres) as nombreChambres from `Attribution` where `idEtab` = ';
$NBChambres2 = $NBChambres;
?>
<?php $__currentLoopData = $reqNBChambres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqNBChambresData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $nb = ($reqNBChambresData->nombreEtabOffrantChambres);
if ($nb != 0) {
?>

    <?php $__currentLoopData = $reqChambres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqChambresData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $NBChambre = ($reqChambresData->nombreChambresOffertes);
    $NBChambres = $NBChambres2;
    $id = ($reqChambresData->idEtablissement);
    $id = '"'.$id.'"';
    $DB = $NBChambres.$id;
    $Verif = DB::select($DB);
    ?>
    <?php $__currentLoopData = $Verif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VerifData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $Disp = ($VerifData->nombreChambres) ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php
    $Dispo = $NBChambre - $Disp;
    if ($Dispo == 0) {
        $Dispo = "Aucune";
    }
    if ($Disp == 0) {
    }
    else {
        ?>
    <div class='mx-auto' style='width: 700px;'>
        <table class='table table-bordered' width='60%' cellspacing='0' cellpadding='0' align='center'class='tabQuadrille'>
            <td colspan='3' align='center'>
                <strong><?php echo e($reqChambresData->nom); ?></strong>
                &emsp; Disponibilités : <?php echo e($Dispo); ?> chambre(s)
            </td>
            <?php
            $Equipe = DB::select('select distinct idE, nom, nomPays from Equipe, Attribution where
        Attribution.idEquipe=Equipe.ide and idEtab='.$id.'');
            ?>
            <tr class='ligneTabQuad'>
                <td width='60%' align='left'><i><strong>Nom Equipe</strong></i></td>
                <td width='30%' align='left'><i><strong>Chambres attribuées</strong></i>
                <td width='10%' align='left'><i><strong>Action</strong></i></td>
                </td>

            </tr>
            <?php $__currentLoopData = $Equipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EquipeData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $idEquipe = ($EquipeData->idE);
            $DBEquipe = DB::select('select nombreChambres,idEtab From Attribution where idEtab='.$id.' and idEquipe="'.$idEquipe.'"');
            ?>
            <?php $__currentLoopData = $DBEquipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DBEquipeData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $NbOccupEquipe = ($DBEquipeData->nombreChambres);
                Log::debug($NbOccupEquipe);
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr class='ligneTabQuad'>
                <td width='60%' align='left'><strong><?php echo e($EquipeData->nom); ?></strong> - <?php echo e($EquipeData->nomPays); ?></td>
                <td width='30%' align='left'><?php echo e($NbOccupEquipe); ?></td>
                <td width='10%'>
                        <center><a href="ModificationA?idEquipe=<?php echo e($EquipeData->idE); ?>&idEtab= <?php echo e($DBEquipeData->idEtab); ?>">Modifier</a></center>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </div>
        <?php
    }
    ?>
    <br> <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <table width='30%' cellspacing='0' cellpadding='0' align='right'>
    <tr><td>
        <a href='EffectuerOuModifier'>
            Effectuer ou modifier les attributions</a></td></tr></table><br><br><br>
    </table>
<?php

}
else {
    echo "Veillez créer des établissements";
}
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/user/Festival/resources/views/consultationAttributions.blade.php ENDPATH**/ ?>