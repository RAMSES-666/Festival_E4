<title>Acceuil > Gestion établissements > Détail des établissements</title>

<?php echo $__env->make("debut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<table align='center' width='85%'>
    <tr>
        <td width='34%' align='left'><a href='GestionEtablissement'>Retour</a>
        </td>
    </tr>
</table>
<div class="mx-auto" style="width: 700px;">
    <table class="table table-hover">
        <?php $__currentLoopData = $reqDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqDetailData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> id : </td>
            <td><?php echo e($reqDetailData->idEtablissement); ?></td>
            <td>  </td>
        </tr>
        <tr>
            <td> adresse : </td>
            <td><?php echo e($reqDetailData->adresseRue); ?></td>
            <td>  </td>
        </tr>
        <tr>
            <td> Code Postal : </td>
            <td><?php echo e($reqDetailData->codePostal); ?></td>
            <td> </td>
        </tr>
        <tr>
            <td> Ville : </td>
            <td><?php echo e($reqDetailData->ville); ?></td>
            <td>  </td>
        </tr>
        <tr>
            <td> Téléphone : </td>
            <td><?php echo e($reqDetailData->tel); ?></td>
            <td>  </td>
        </tr>
        <tr>
            <td>E-Mail : </td>
            <td><?php echo e($reqDetailData->adresseElectronique); ?></td>
            <td> </td>
        </tr>
        <tr>
            <td> Type : </td>
            <td>
                <?php
                $TYPE = ($reqDetailData->type);
                if ($TYPE == 1) {
                    echo "Etablissement Scolaire";
                }
                else {
                    echo "Autre";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td> Responsable : </td>
            <td><?php echo e($reqDetailData->nomResponsable); ?></td>
            <td>  </td>
        </tr>
        <tr>
            <td> Offre : </td>
            <td><?php echo e($reqDetailData->nombreChambresOffertes); ?></td>
            <td> </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php /**PATH /home/user/Festival/resources/views/detailEtablissement.blade.php ENDPATH**/ ?>