<title>Acceuil > Gestion attribution > Nouvelle Attributions</title>
@include('debut')

<form method='post' action='EffectAttrib'>
@csrf

    <center>
        <h4> Nouvelle Attributions</h4>
    </center>

    <div class="mx-auto" style="width: 800px;">
        <table class="table table-hover">
            <tr>
                <td> <br> Equipe :
                    <select class="form-control" name='AttribEkip'>
                        <option value="">-- Choisissez une équipe --</option>
                    	<?php
			            $Equipe = DB::select('select distinct idE, nom, nomPays from Equipe');
			            ?>
			            @foreach ($Equipe as $EquipeData)

                        <option value= "{{$EquipeData->idE}}" >{{$EquipeData->nom}} - {{$EquipeData->nomPays}}</option>
                        @endforeach
                </td>
                <td> <br> Nombre chambres désirée :<input type="number" class="form-control"
                        name="nombreChambresDesiree" size="1"
                        onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" min="0" required>
                </td>
                </tr>
                <tr>
                    <td><br>
                        Etablissement souhaité :
                         <select class="form-control" name='AttribEtab'>
                        <?php
                        $Etab = DB::select('select distinct idEtablissement, nom from Etablissement');
                        ?>
                        <option value="">--  Choisissez un établissement  --</option>
                        @foreach ($Etab as $EtabData)

                        <option value="{{$EtabData->idEtablissement}}">{{$EtabData->nom}}</option>
                        @endforeach
                    </td>
                </tr>
        </table>

    </div>
    <div class="mx-auto" style="width: 1000px;">
        <table class="table table-borderless">
            <thead>
                <tr class='ligneTabNonQuad'>
                    <td width='45%'></td>
                    <td><button type="submit" value="Valider" class="btn btn-primary mb-2">Valider</button></td>
                </tr>
        </table>
        <table align='center' width='85%'>
            <tr>
                <td width='50%' align='right'><a href='AttributionChambres'>Retour</a>
                </td>
            </tr>
        </table>

    </div>
      <?php

// En cas de validation du formulaire : affichage des erreurs ou du message de
// confirmation
// if ($action=='validerCreEtab')
// {
//    if (nbErreurs()!=0)
//    {
//       afficherErreurs();
//    }
//    else
//    {
//       echo '<meta http-equiv="refresh" content="0 ; URL=listeEtablissements.php">';
//    }
// }

?>