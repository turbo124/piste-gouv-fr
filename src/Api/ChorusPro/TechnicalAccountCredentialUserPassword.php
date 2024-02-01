<?php

namespace PisteGouvFr\Api\ChorusPro;

final class TechnicalAccountCredentialUserPassword extends TechnicalAccountCredential {

    public function __construct( string $technical_account_email, string $technical_account_password ) {
        parent::__construct( base64_encode($technical_account_email.':'.$technical_account_password ));
    }

}