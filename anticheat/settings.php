<?php
$margin = 1000;
$local_stars = 190; // From Stereo Madness to Fingerdash + The challenge (3 stars)
$local_coins = 66; //66 = (21 levels * 3 coins) + 1 (from the menu) + 2 (glubfub and sparky from the vault)
$local_demons = 3; // Clubstep, ToE II and Deadlocked

$_s = array(
    "anticheat" => array(
        "stars" => array(
            "margin" => $margin,
            "local" => $local_stars
        ),

        "coins" => array(
            "margin" => $margin,
            "local" => $local_coins 
        ),

        "usercoins" => array(
            "margin" => $margin
        ),

        "demons" => array(
            "margin" => $margin,
            "local" => $local_demons
        )
    )
);

?>
