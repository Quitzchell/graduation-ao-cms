<?php

return [
    '2fa' => [

        /*
         * If enabled, CMS users will have the opportunity to use 2FA for logging in to the CMS
         */
        'enabled' => false,

        /*
         * If enabled, CMS users will be required to use 2FA for logging in to the CMS.
         * A user will not be able to view or edit any content until the have activated 2FA for their account
         */
        'force' => false,

        /*
         * The window determines how many minutes a 2FA authentication token is valid for. This defaults to 1 minute.
         * Only integer values are valid.
         */
        'window' => 1,
    ],
];
