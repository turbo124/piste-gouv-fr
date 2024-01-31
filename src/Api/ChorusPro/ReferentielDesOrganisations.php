<?php

namespace PisteGouvFr\Api\ChorusPro;

use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\ServiceRechercheRequete;
use PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\StructureRechercheRequete;
use PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\PieceJointeStructure;
use PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\Service;
use PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\Structure;
use PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourListerPiecesJointesStructure;
use PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourRechercherServicesStructure;
use PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourRechercherStructures;

/**
 * Class d'execution capable d'effectuer les appels à l'Api Chorus-Pro Référentiel des Organisations
 *
 * @version ApiVersion:1.1.6
 */
class ReferentielDesOrganisations extends ChorusProApi {

    public static function getBasePath(): string {
        return '/cpro/organisations/v1';
    }

    /**
     * @return array
     * @throws \PisteGouvFr\PisteException
     */
    public function healthCheck(): array {
        return $this->ChorusPro->get( static::getBasePath() . '/healthcheck' );
    }

    /**
     * @param string $uuidStructure
     * @param string $uuidPieceJointe
     *
     * @return PieceJointeStructure
     * @throws \PisteGouvFr\PisteException
     */
    public function recupererPieceJointeStructure( string $uuidStructure, string $uuidPieceJointe ): PieceJointeStructure {
        /** @var PieceJointeStructure $retour */
        $retour = $this->ChorusPro->get(
            static::getBasePath() . '/structures/' . $uuidStructure . '/pieces_jointes/' . $uuidPieceJointe, [],
            PieceJointeStructure::class
        );
        return $retour;
    }

    /**
     * @param string $uuidStructure
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourRechercherServicesStructure
     * @throws \PisteGouvFr\PisteException
     */
    public function rechercherServicesStructure( string $uuidStructure ): WsRetourRechercherServicesStructure {
        /** @var WsRetourRechercherServicesStructure $retour */
        $retour = $this->ChorusPro->get(
            static::getBasePath() . '/structures/' . $uuidStructure . '/services', [],
            WsRetourRechercherServicesStructure::class
        );
        return $retour;
    }

    /**
     * @param string $uuidStructure
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\Structure
     * @throws \PisteGouvFr\PisteException
     */
    public function consulterStructure( string $uuidStructure ): Structure {
        /** @var Structure $retour */
        $retour = $this->ChorusPro->get(
            static::getBasePath() . '/structures/' . $uuidStructure, [],
            Structure::class
        );
        return $retour;
    }

    /**
     * @param string $uuidStructure
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourListerPiecesJointesStructure
     * @throws \PisteGouvFr\PisteException
     */
    public function listerPiecesJointesStructure( string $uuidStructure ): WsRetourListerPiecesJointesStructure {
        /** @var WsRetourListerPiecesJointesStructure $retour */
        $retour = $this->ChorusPro->get(
            static::getBasePath() . '/structures/' . $uuidStructure . '/pieces_jointes', [],
            WsRetourListerPiecesJointesStructure::class
        );
        return $retour;
    }

    public function modifierStructure( string $uuidStructure, ?bool $reception_edi, ?bool $connexion_edi ) {

        $values = [];
        if ( null !== $reception_edi ) {
            $values[ 'reception_edi' ] = $reception_edi;
        }
        if ( null !== $connexion_edi ) {
            $values[ 'connexion_edi' ] = $connexion_edi;
        }

        /** @var WsRetourListerPiecesJointesStructure $retour */
        $retour = $this->ChorusPro->patch(
            static::getBasePath() . '/structures/' . $uuidStructure . '/parametres-edi',
            [
                'json' => $values
            ]
        );
        return $retour;
    }

    /**
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\StructureRechercheRequete $structureRecherche
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourRechercherStructures
     * @throws \PisteGouvFr\PisteException
     */
    public function rechercherStructures( StructureRechercheRequete $structureRecherche ): WsRetourRechercherStructures {
        /** @var WsRetourRechercherStructures $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/structures/recherche',
            [
                'json' => $structureRecherche
            ]
        );
        return $retour;
    }

    /**
     * @param string $uuidService
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\Service
     * @throws \PisteGouvFr\PisteException
     */
    public function consulterService( string $uuidService ): Service {
        /** @var Service $retour */
        $retour = $this->ChorusPro->get(
            static::getBasePath() . '/services/' . $uuidService, [],
            Service::class
        );
        return $retour;
    }

    public function creerService() {
        // TODO : implementer creerService
    }

    /**
     * @param \PisteGouvFr\Api\ChorusPro\Parameter\ReferentielDesOrganisations\ServiceRechercheRequete $serviceRecherche
     *
     * @return \PisteGouvFr\Api\ChorusPro\WsRetour\ReferentielDesOrganisations\WsRetourRechercherStructures
     * @throws \PisteGouvFr\PisteException
     */
    public function rechercherServiceOrganisation( ServiceRechercheRequete $serviceRecherche ): WsRetourRechercherStructures {
        /** @var WsRetourRechercherStructures $retour */
        $retour = $this->ChorusPro->post(
            static::getBasePath() . '/services/recherche',
            [
                'json' => $serviceRecherche
            ]
        );
        return $retour;
    }

}
