<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'token' => env('HETZNER_TOKEN'),
    'base_url' => env('HETZNER_BASE_URL', 'https://api.hetzner.cloud/v1'),
];
