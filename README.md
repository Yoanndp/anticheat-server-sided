Anticheat Server Sided
===================
This is a simple anticheat server sided for GDPS's. (compatible with CvoltonGDPS source)

----------


Its functioning
-------------
It performs multiple actions:

 >- It considers the total amount of stars from all online levels.
 >- It considers the total amount of stars from all map packs.
 >- It considers the amount of stars from **local levels**<sup>[1](#local)</sup> (Stereo madness to Fingerdash).
 >- It has a star margin.


Get it to work
-------------

 1. Upload **Anticheat** folder into your gdps.
 2. Edit **settings.php** with your values.
 2. Update **getGJScores.php** and add theses lines:
```php
require "anticheat/anticheat.php";
$ac = new Anticheat();
if($ac->check($accountID)){
	$ac->ban_by_accountID($accountID);
}
```
-------------
<a name="local">1</a>: For next updates, this value will be modifiable (in case of new local levels)
