<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
   <?php echo $__env->make("debut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>

    <br>

    <div class="mx-auto" style="width: 800px;">
        Cette application web permet de gérer l'hébergement des etablissements
        durant le festival M2L.
        <br>
        Elle offre les services suivants :
        <br> <br>
        <ul>
            <li>Gérer les établissements (caractéristiques et capacités d'accueil) acceptant d'héberger les
                groupes
                de sports.
                <p>
                </p>
            <li>Consulter, réaliser ou modifier les attributions des chambres aux groupes dans les
                établissements.
        </ul>

    </div>

</body>

</html>
<?php /**PATH /home/user/Festival/resources/views/Acceuil.blade.php ENDPATH**/ ?>