<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class ParametresRechercherStructure implements \JsonSerializable {

    const TRISENS_ASC  = 'Ascendant';
    const TRISENS_DESC = 'Descendant';

    const TRICOLONNE_IDENTIFIANTSTRUCTURE     = 'IdentifiantStructure';
    const TRICOLONNE_DESIGNATIONSTRUCTURE     = 'DesignationStructure';
    const TRICOLONNE_TYPEIDENTIFIANTSTRUCTURE = 'TypeIdentifiantStructure';
    const TRICOLONNE_STATUT                   = 'Statut';


    /** @car int|null */
    private $pageResultatDemandee;
    /** @car int|null */
    private $nbResultatsParPage;
    /** @car string|null */
    private $triSens;
    /** @car string|null */
    private $triColonne;
    /** @car  array */
    private $champsDeTri;
    /** @car string|null */
    private $ordreTriGenerique;
    /** @car int|null */
    private $taillePageGenerique;
    /** @car int|null */
    private $indexPageGenerique;

    /**
     * @param int    $pageResultatDemandee
     * @param int    $nbResultatsParPage
     * @param string $triSens
     * @param string $triColonne
     * @param array  $champsDeTri
     * @param string $ordreTriGenerique
     * @param int    $taillePageGenerique
     * @param int    $indexPageGenerique
     */
    public function __construct(int $pageResultatDemandee = 0, int $nbResultatsParPage = 0, string $triSens = self::TRISENS_DESC, string $triColonne = self::TRICOLONNE_IDENTIFIANTSTRUCTURE, array $champsDeTri = [], string $ordreTriGenerique = self::TRISENS_DESC, int $taillePageGenerique = 0, int $indexPageGenerique = 0) {
        $this->pageResultatDemandee = $pageResultatDemandee;
        $this->nbResultatsParPage   = $nbResultatsParPage;
        $this->triSens              = $triSens;
        $this->triColonne           = $triColonne;
        $this->champsDeTri          = $champsDeTri;
        $this->ordreTriGenerique    = $ordreTriGenerique;
        $this->taillePageGenerique  = $taillePageGenerique;
        $this->indexPageGenerique   = $indexPageGenerique;
    }


    public function jsonSerialize(): mixed {
        return array_filter([
                                'pageResultatDemandee' => $this->pageResultatDemandee,
                                'nbResultatsParPage'   => $this->nbResultatsParPage,
                                'triSens'              => $this->triSens,
                                'triColonne'           => $this->triColonne,
                                'champsDeTri'          => $this->champsDeTri,
                                'ordreTriGenerique'    => $this->ordreTriGenerique,
                                'taillePageGenerique'  => $this->taillePageGenerique,
                                'indexPageGenerique'   => $this->indexPageGenerique,
                            ], function($v) { return !is_null($v); });
    }
}
