<?php

// /

Route::any('{other}', function() {
    return 'It works!';
})->where('other', '.*');
