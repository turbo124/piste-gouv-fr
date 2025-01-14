<?php

namespace PisteGouvFr\Api\ChorusPro\Type;


interface IStatus {
    const IN_EN_ATTENTE_RETRAITEMENT_CPP = 'IN_EN_ATTENTE_RETRAITEMENT_CPP';
    const IN_EN_ATTENTE_TRAITEMENT_CPP = 'IN_EN_ATTENTE_TRAITEMENT_CPP';
    const IN_EN_COURS_TRAITEMENT_CPP = 'IN_EN_COURS_TRAITEMENT_CPP';
    const IN_INCIDENTE = 'IN_INCIDENTE';
    const IN_INTEGRE = 'IN_INTEGRE';
    const IN_INTEGRE_PARTIEL = 'IN_INTEGRE_PARTIEL';
    const QP_IRRECEVABLE = 'QP_IRRECEVABLE';
    const QP_RECEVABLE = 'QP_RECEVABLE';
    const QP_RECEVABLE_AVEC_ERREUR = 'QP_RECEVABLE_AVEC_ERREUR';
    const IN_REJETE = 'IN_REJETE';
    const IN_RECU = 'IN_RECU';
    const IN_TRAITE_SE_CPP = 'IN_TRAITE_SE_CPP';

    const LANFR = [
        self::IN_EN_ATTENTE_RETRAITEMENT_CPP => 'En attente de retraitement',
        self::IN_EN_ATTENTE_TRAITEMENT_CPP => 'En attente de traitement',
        self::IN_EN_COURS_TRAITEMENT_CPP => 'En cours de traitement',
        self::IN_INCIDENTE => 'Incidenté',
        self::IN_INTEGRE => 'Intégré',
        self::IN_INTEGRE_PARTIEL => 'Intégré partiellement',
        self::QP_IRRECEVABLE => 'Irrecevable',
        self::QP_RECEVABLE => 'Recevable',
        self::QP_RECEVABLE_AVEC_ERREUR => 'Recevable avec erreur',
        self::IN_REJETE => 'Rejeté',
        self::IN_RECU => 'Reçu',
        self::IN_TRAITE_SE_CPP => 'Traité'
    ];
}
