<?php
    //Adatbázishoz csatlakozás
     require_once("dbconn.php");

     require 'facebook.php';

     $app_id = '147259788772077';
     $app_secret = 'ba585619ea79538c6d0efe8cacd7e92b';
     $app_namespace = 'ismerdmegapeteket';
     $app_url = 'http://apps.facebook.com/' . $app_namespace . '/';
     $scope = 'email,publish_actions';

      //Kapcsolódás a Facebook SDK-hoz
      $facebook = new Facebook(array(
        'appId'  => $app_id,
        'secret' => $app_secret,
      ));

      //Az aktuális felhasználó
      $user = $facebook->getUser();

      //Ha még nem engedélyeztette az alkalmazást, akkor engedélyeztessük
      if (!$user) {
        $loginUrl = $facebook->getLoginUrl(array(
          'scope' => $scope,
          'redirect_uri' => $app_url,
        ));

        print('<script> top.location.href=\'' . $loginUrl . '\'</script>');

      }

        //Felhasználó datbázisba mentése, ha kell
        if ($user){ 
            $userInfo= $facebook->api("/$user"); 
            $email = $userInfo['email']; 
            $name = $userInfo['name']; 
            $gender = $userInfo['gender']; 
            $uid = $user['id']; 

        if (!empty($user)) {
        //ellenőrízzük, hogy a felhasználó szerepel-e már az adatbázisban
        $query = mysql_query("SELECT * FROM users WHERE uid = " . $user['id']);
        $result = mysql_fetch_array($query);
 
 
        //Ha nem szerepel, akkor adjuk hozzá
        if (empty($result)) {
            $query1 = mysql_query("INSERT INTO felhasznalo (uid, name, fn, ln, usern, email) VALUES ({$user['id']}, '{$user['name']}', '{$user['first_name']}', '{$user['last_name']}','{$user['username']}','{$user['email']}'");
        }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Ez itt egy próba</title>
    </head>
    <body>
        <?php
            $selected =  mk_rnd(0,9);
            $sql = SELECT * FROM szoveg WHERE id = '$selected';
            $mysql_result = mysql_query($sql);
            $kvizkerdes = mysql_fetch_array($mysql_result);

            echo($kvizkerdes["szoveg"];

        ?>
    </body>
</html>
