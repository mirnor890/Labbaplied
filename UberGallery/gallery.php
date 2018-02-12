<?php
    //include('header-gallery.php');
    include('../header.php');

    // Include the UberGallery class
    include('resources/UberGallery.php');


    ?>      

            
<a class="btn btn-danger" href="../login.php">Log in here to upload your picture</a>
 


<?php

    // Initialize the UberGallery object
    $gallery = new UberGallery();

    // Initialize the gallery array
    $galleryArray = $gallery->readImageDirectory('gallery-images');

    // Define theme path
    if (!defined('THEMEPATH')) {
        define('THEMEPATH', $gallery->getThemePath());
    }

    // Set path to theme index
    $themeIndex = $gallery->getThemePath(true) . '/index.php';

    // Initialize the theme
    if (file_exists($themeIndex)) {
        include($themeIndex);
    } else {
        die('ERROR: Failed to initialize theme');
    }
