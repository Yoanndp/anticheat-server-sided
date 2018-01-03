<?php
/*
Anticheat server sided for GDPSes made by Yoanndp
*/
class Anticheat{
    public function check($accountID){
        chdir(dirname(__FILE__));
        require "../connection.php";
        $starsLimit = Self::get_total_of_stars();
        $q = $db->prepare("SELECT stars FROM users WHERE extID = :accid");
        $q->execute([":accid" => $accountID]);
        $stars = $q->fetchColumn();
        
        return $stars > $starsLimit;
    }

    static public function get_total_of_stars(){
        chdir(dirname(__FILE__));
        require "../connection.php";
        require "settings.php";

        //local levels stars
        $totalStars = $_s["anticheat"]["local_stars"];

        //limit setup by me
        $totalStars += $_s["anticheat"]["stars_limit"];

        //online levels stars
        $q = $db->query("SET @amount := 0");
        $q = $db->query("SELECT @amount := @amount + starStars AS amount FROM levels WHERE starStars > 0 ORDER BY amount DESC LIMIT 1");
        $totalStars += $q->fetchColumn();

        //map packs stars
        $q = $db->query("SET @amount := 0");
        $q = $db->query("SELECT @amount := @amount + stars AS amount FROM mappacks WHERE stars > 0 ORDER BY amount DESC LIMIT 1");
        $totalStars += $q->fetchColumn();

        return $totalStars;        
    }

    public function ban_by_accountID($accountID){
        chdir(dirname(__FILE__));
        require "../connection.php";

        $q = $db->prepare("UPDATE users SET isBanned = 1 WHERE extID = :accountid");
        $q->execute([":accountid" => $accountID]);
    }
}
?>
