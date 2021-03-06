<title>Acceuil > Gestion établissements > Modification établissements</title>

<?php echo $__env->make("debut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<table align='center' width='85%'>
    <tr>
        <td width='34%' align='left'><a href='GestionEtablissement'>Retour</a>
        </td>
    </tr>
</table>
<form method='POST' action="ModificationExec">
<?php echo csrf_field(); ?>
<center>
    <h4> Modification d'un Établissement </h4>
</center>
<?php $__currentLoopData = $reqModif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reqModifData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="mx-auto" style="width: 800px;">
    <table class="table table-hover">
        <tr>
            <td> id : <input type='text' class="form-control" name='id' value='<?php echo e($reqModifData->idEtablissement); ?>' size='1'
                maxlength='8' readonly>
                <br>
            </td>
            <td>
            <td></td>
            </td>
        </tr>
        <tr>
            <td>Nom : <input type="text" class="form-control" name="nom" value='<?php echo e($reqModifData->nom); ?>'
                    maxlength="45" required></td>
            <td>Adresse :<input type="text" class="form-control" name="adresseRue"
                    value='<?php echo e($reqModifData->adresseRue); ?>' maxlength="45" required></td>
            <td>Code Postal :<input type="number" class="form-control" name="codePostal" value='<?php echo e($reqModifData->codePostal); ?>'
                    onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;"></td>
        </tr>
        <tr>
            <td>Ville :<input type="text" class="form-control" name="ville" value='<?php echo e($reqModifData->ville); ?>'
                    maxlength="35" required></td>
            <td>Téléphone :<input type="number" class="form-control" name="tel" value='<?php echo e($reqModifData->tel); ?>'
                    maxlength="10" required></td>
            <td>E-mail (non obligatoire) :<input type="email" class="form-control"
                value='<?php echo e($reqModifData->adresseElectronique); ?>' name="adresseElectronique" maxlength="70"></td>
        </tr>
        <tr>
            <br> <br>
            <td> <br> <strong> Type: </strong> </td>
            <?php
            $type = $reqModifData->type;
            if ($type == 0) {
                echo "<td> <br> <input type='radio' name='type' value='1'> Etablissement Scolaire </td>";
                echo "<td> <br> <input type='radio' name='type' value='0' checked> autre </td>";
            } else {
                echo "<td> <br> <input type='radio' name='type' value='1' checked> Etablissement Scolaire </td>";
                echo "<td> <br> <input type='radio' name='type' value='0'> autre </td>";
            }

            ?>
        </tr>

        </td>
        </tr>
        <tr>
            <td> <br> <br> <strong>Responsable :</strong></td>
            </select>
            <td> <br> Nom : <input type="text" class="form-control" value='<?php echo e($reqModifData->nomResponsable); ?>'
                    name="nomResponsable" size="26" maxlength="25">
            </td>
            <td> <br> Prénom : <input type="text" class="form-control"
                    value='<?php echo e($reqModifData->prenomResponsable); ?>' name="prenomResponsable" size="26"
                    maxlength="25"> </td>
        </tr>
        <tr>
            <td></td>
            <td> <br> Civilité :
                <div id="civiliteResponsable">
                    <input type="text" class="form-control" name="civiliteResponsable"
                    onclick="civilite()" value='<?php echo e($reqModifData->civiliteResponsable); ?>'>
                </div>
            </td>
            <td> <br> Nombre chambres offertes :<input type="number" class="form-control" name="nombreChambresOffertes"
                value='<?php echo e($reqModifData->nombreChambresOffertes); ?>' onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" min="0" required></td>

        </tr>
    </table>
</div>
<div class="mx-auto" style="width: 1000px;">
    <table class="table table-borderless">
        <thead>
            <tr class='ligneTabNonQuad'>
                <td width='85%'></td>
                <td><button type="submit" value="Valider" class="btn btn-primary mb-2">Valider</button></td>
            </tr>
    </table>
</div>
<script>
function civilite() {
    let elem = document.getElementById("civiliteResponsable");
    elem.innerHTML = '<?php
    echo '<select class="form-control" name="civiliteResponsable">';
    echo "<option>M</option>";
    echo "<option>Mme</option>";
    echo "<option>Melle</option>";

                    ?> ';
}
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/user/Festival/resources/views/modificationEtablissement.blade.php ENDPATH**/ ?>