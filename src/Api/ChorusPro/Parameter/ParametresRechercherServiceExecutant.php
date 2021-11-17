<?php

namespace PisteGouvFr\Api\ChorusPro\Parameter;


class ParametresRechercherServiceExecutant implements \JsonSerializable {

    const TRISENS_ASC  = 'Ascendant';
    const TRISENS_DESC = 'Descendant';


    const TRICOLONNE_CODESERVICEEXECUTANT = 'CodeServiceExecutant';
    const TRICOLONNE_NOMSERVICEEXECUTANT  = 'NomServiceExecutant';


    /** @car int|null */
    private $nbResultatsMaximum;
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
    public function __construct(int $nbResultatsMaximum = 0, int $pageResultatDemandee = 0, int $nbResultatsParPage = 0, string $triSens = null, string $triColonne = null, array $champsDeTri = null, string $ordreTriGenerique = null, int $taillePageGenerique = null, int $indexPageGenerique = null) {
        $this->nbResultatsMaximum   = $nbResultatsMaximum;
        $this->pageResultatDemandee = $pageResultatDemandee;
        $this->nbResultatsParPage   = $nbResultatsParPage;
        $this->triSens              = $triSens;
        $this->triColonne           = $triColonne;
        $this->champsDeTri          = $champsDeTri;
        $this->ordreTriGenerique    = $ordreTriGenerique;
        $this->taillePageGenerique  = $taillePageGenerique;
        $this->indexPageGenerique   = $indexPageGenerique;
    }


    public function jsonSerialize(): array {
        return array_filter([
                                'nbResultatsMaximum'   => $this->nbResultatsMaximum,
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
