<title>Acceuil > Gestion établissements</title>
<?php echo $__env->make("debut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="mx-auto" style="width: 900px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td colspan='4'>Etablissements</td>
            </tr>
                <?php
                $id = NULL;
                $NBChambres2 = NULL;
                $NBChambres2 = $NBChambres;
                ?>
            <?php $__currentLoopData = $reqEtab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqEtabData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $NBChambres = $NBChambres2 ?>
                <tr class="ligneTabNonQuad">
                    <td width='44%'><?php echo e($reqEtabData->nom); ?></td>
                    <td width='16%'>
                        <center><a href="Detail?idEtablissement=<?php echo e($reqEtabData->idEtablissement); ?>">Voir Detail</a></center>
                    </td>
                    <td width='16%'>
                        <center><a href="Modification?idEtablissement=<?php echo e($reqEtabData->idEtablissement); ?>">Modifier</a></center>
                        <?php
                        $id = ($reqEtabData->idEtablissement);
                        $nombreChambresOffertes = ($reqEtabData->nombreChambresOffertes);
                        ?>
                    </td>
                    <td width='16%' align='center'>
                        <?php
                        $id = '"'.$id.'"';
                        $NBChambres = $NBChambres.$id;
                        $Verif = DB::select($NBChambres);
                        ?>
                        <?php $__currentLoopData = $Verif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VerifData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $nbEtabChambres = ($VerifData->nombreChambres);
                            if ($nbEtabChambres == NULL) {
                                $nbEtabChambres = 0;
                            }
                            $nb = $nombreChambresOffertes - $nbEtabChambres;
                            if ($nbEtabChambres == 0) {
                                ?>
                                <a href="Suppresion?idEtablissement=<?php echo e($reqEtabData->idEtablissement); ?>">Supprimer</a>
                                <?php
                            }
                            elseif ($nb == 0) {
                                echo "Complet";
                            }
                            else {
                                echo "Chambres libres : $nb";
                            }
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</table>
<div class="mx-auto" style="width: 1200px;">
    <table class="table table-borderless">
        <thead>
            <tr class='ligneTabNonQuad'>
                <td width='70%'></td>

                <td colspan='4'><a href='Creation'>
                        Création d'un établissement</a></td>
            </tr>
    </table>
</div>
<?php /**PATH /home/user/Festival/resources/views/listeEtablissements.blade.php ENDPATH**/ ?>