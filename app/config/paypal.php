<?php
return array(
    // set your paypal credential
    'client_id' => 'ASlv11uHWcY0rY23sEVJ_Xj8O2MvDt6k9dKKgv88b05QKq9cdc1xF36ZIjrUcev5hCGOyFmtYMWnMYm_',
    'secret' => 'EOI8WvaAjcQgFQLE8qs9_Sj1iSEcs_kwkVP4umZyNdBThi7AM7BVSw0wOrpq6b1b4Vil57lCv66hOYHP',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);