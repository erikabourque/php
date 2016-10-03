<?php

    $countriesText = fopen("Countries.txt", "r");
    
    while (!feof($countriesText)){
        $countries[] = trim(fgets($countriesText));
    }
    
    fclose($countriesText);
    
    $interests = [
        'poker',
        'chess',
        'checkers',
        'dominoes',
        'solitaire',
        'rummy',
        'risk',
        'settlers of catan'
    ];

?>