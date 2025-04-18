<?php

use App\Calcul;

// management of the display time slot
if (isset($_GET['temps'])) {
    switch ($_GET['temps']) {
        case "tous":
            // formats the date as datetime in the present and in the past
            $tps = Calcul::laDate(CHOIX_DATE["tous"]);
            $letps = "le début";
            break;
        case "1-an":
            $tps = Calcul::laDate(CHOIX_DATE["1 an"]);
            $letps = "1 an";
            break;
        case "6-mois":
            $tps = Calcul::laDate(CHOIX_DATE["6 mois"]);
            $letps = "6 mois";
            break;
        case "3-mois":
            $tps = Calcul::laDate(CHOIX_DATE["3 mois"]);
            $letps = "3 mois";
            break;
        case "1-mois":
            $tps = Calcul::laDate(CHOIX_DATE["1 mois"]);
            $letps = "1 mois";
            break;
        case "2-semaines":
            $tps = Calcul::laDate(CHOIX_DATE["2 semaines"]);
            $letps = "2 semaines";
            break;
        case "1-semaine":
            $tps = Calcul::laDate(CHOIX_DATE["1 semaine"]);
            $letps = "1 semaine";
            break;
        case "1-jour":
            $tps = Calcul::laDate(CHOIX_DATE["1 jour"]);
            $letps = "1 jour";
            break;
        default:
            $tps = Calcul::laDate(CHOIX_DATE["tous"]);
            $letps = "le début";
    }
} else {
    $tps = Calcul::laDate(CHOIX_DATE["tous"]);
    $letps = "le début";
}