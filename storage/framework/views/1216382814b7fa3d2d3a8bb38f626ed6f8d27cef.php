<title>Acceuil > Gestion établissements > Suppression établissements</title>


<?php echo $__env->make("debut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__currentLoopData = $reqNom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqNomData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$nom = ($reqNomData->nom);
$id = ($reqNomData->idEtablissement);
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php

?>

<br><center><h5>Souhaitez-vous vraiment supprimer l'établissement <?php echo e($nom); ?> ?
<br><br>
<a href='SuppressionExec?idEtablissement=<?php echo e($id); ?>'>
Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
<a href='GestionEtablissement'>Non</a></h5></center>



<?php /**PATH /home/user/Festival/resources/views/suppressionEtablissement.blade.php ENDPATH**/ ?>