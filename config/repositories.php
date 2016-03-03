<?php
$repositories = array(
    'mobile-shopify' => array(
        'url'       =>  'git@github.com:LiquidBarcelona/mobile-shopify.git',
        'branch'    =>  'refs/heads/devel',
        'path'      =>  '/var/www/mobile-shopify/',
        'script'    =>  'deploy-mobile.sh',
        'log'       =>   'mobile-shopify'
    ),
    'momentum' => array(
        'url'       =>  'git@github.com:LiquidBarcelona/momentum.git',
        'branch'    =>  'refs/heads/devel',
        'path'      =>  '/var/www/momentum/',
        'script'    =>  'deploy-momentum.sh',
        'log'       =>   'momentum'
    ),
);