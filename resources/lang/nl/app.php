<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during the app
    |
    */

    'timeout_not_reached' => 'U kunt vandaag nog geen nieuwe status toevoegen',

    'statuses.new' => 'Nieuwe status toevoegen',
    'statuses.count'=> 'Aantal gasten (op dit moment zijn maximaal ' .env("MAX_ALLOWED_CAPACITY", '15'). '(15%) toegestaan',
    'statuses.count_placeholder'=> 'Huidig aantal gasten binnen uw verblijf',
    'statuses.create.success'=> 'Status update is opgeslagen',
    'max_allowed_capacity' => env("MAX_ALLOWED_CAPACITY", '15'),
    'form.save' => "Opslaan",
    'form.reset' => 'Reset',
    'form.cancel' => 'Annuleren',

    'date' => 'Datum',

    'login' => 'Inloggen',
    'logout' => 'Afmelden',
    'register' => 'Aanmelden',
];
