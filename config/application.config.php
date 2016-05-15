<?php

return array(
    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule',
        'DoctrineDataFixtureModule',
        'Client', //base module
        'Login',
        'Ead'
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{{,*.}global,{,*.}local}.php',
        ),
    )
);
