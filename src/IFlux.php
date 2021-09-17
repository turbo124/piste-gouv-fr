<?php

namespace PhpChorusPiste;


interface IFlux
{

    /**
     * Show : https://communaute.chorus-pro.gouv.fr/documentation/exemples-de-flux/
     */
    const IN_DP_E1_UBL_INVOICE = 'IN_DP_E1_UBL_INVOICE';
    const IN_DP_E1_CII = 'IN_DP_E1_CII';
    const IN_DP_E1_PES_FACTURE = 'IN_DP_E1_PES_FACTURE';
    const IN_DP_E1_XCBL = 'IN_DP_E1_XCBL';
    const IN_DP_E1_CII_16B = 'IN_DP_E1_CII_16B';
    const IN_DP_E2_UBL_INVOICE_MIN = 'IN_DP_E2_UBL_INVOICE_MIN';
    const IN_DP_E2_CII_MIN = 'IN_DP_E2_CII_MIN';
    const IN_DP_E2_PES_FACTURE_MIN = 'IN_DP_E2_PES_FACTURE_MIN';
    const IN_DP_E2_CPP_FACTURE_MIN = 'IN_DP_E2_CPP_FACTURE_MIN';
    const IN_DP_E2_CII_FACTURX = 'IN_DP_E2_CII_FACTURX';
    const IN_DP_E2_CII_MIN_16B = 'IN_DP_E2_CII_MIN_16B';
}
