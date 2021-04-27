<title>Acceuil > Attribution chambres</title>
@include("debut")
<?php
$id = NULL;
$NBChambres = 'select sum(nombreChambres) as nombreChambres from `Attribution` where `idEtab` = ';
$NBChambres2 = $NBChambres;
?>
@foreach ($reqNBChambres as $reqNBChambresData)
<?php $nb = ($reqNBChambresData->nombreEtabOffrantChambres);
if ($nb != 0) {
?>

    @foreach ($reqChambres as $reqChambresData)
    <?php
    $NBChambre = ($reqChambresData->nombreChambresOffertes);
    $NBChambres = $NBChambres2;
    $id = ($reqChambresData->idEtablissement);
    $id = '"'.$id.'"';
    $DB = $NBChambres.$id;
    $Verif = DB::select($DB);
    ?>
    @foreach ($Verif as $VerifData)
    <?php $Disp = ($VerifData->nombreChambres) ?>
    @endforeach
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
                <strong>{{$reqChambresData->nom}}</strong>
                &emsp; Disponibilités : {{$Dispo}} chambre(s)
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
            @foreach ($Equipe as $EquipeData)
            <?php
            $idEquipe = ($EquipeData->idE);
            $DBEquipe = DB::select('select nombreChambres,idEtab From Attribution where idEtab='.$id.' and idEquipe="'.$idEquipe.'"');
            ?>
            @foreach ($DBEquipe as $DBEquipeData)
            <?php
                $NbOccupEquipe = ($DBEquipeData->nombreChambres);
                Log::debug($NbOccupEquipe);
            ?>
            @endforeach
            <tr class='ligneTabQuad'>
                <td width='60%' align='left'><strong>{{$EquipeData->nom}}</strong> - {{$EquipeData->nomPays}}</td>
                <td width='30%' align='left'>{{$NbOccupEquipe}}</td>
                <td width='10%'>
                        <center><a href="ModificationA?idEquipe={{$EquipeData->idE}}&idEtab= {{$DBEquipeData->idEtab}}">Modifier</a></center>

                </td>
            </tr>
            @endforeach

        </table>
    </div>
        <?php
    }
    ?>
    <br> <br>
    @endforeach
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
@endforeach