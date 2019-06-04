<?php
    session_start();
    require 'db_connect.php';
    require 'session.php';

/*

CREATE EVENT proposal_Remover_id15Days
ON SCHEDULE EVERY 1 DAY
ON COMPLETION PRESERVE -- Çalıştıktan sonra drop olmasın
DO
   UPDATE proposal SET isActive = 0 WHERE create_time >= now() + INTERVAL 15 DAY;
   
-- DROP EVENT proposal_Remover_id15Days; 
SHOW EVENTS 
*/


    /*
     MYSQL de SCHUDELER KULLANDIM 15 GÜN GEÇİNCE SİLMEK İÇİN SİLMEK!

-- SELECT createdAt FROM proposal WHERE createdAt - CURDATE() < 15;
-- SELECT CURDATE(); -- Yıl Ay Gün getirir
-- SELECT curtime(); -- Saat Dakika Saniye Getir

    CREATE EVENT proposal_Remover_id15Days
    ON SCHEDULE EVERY 5 SECOND
    ON COMPLETION PRESERVE -- Çalıştıktan sonra drop olmasın
    DO
       UPDATE proposal SET isActive = 0 WHERE create_time >= now() + INTERVAL 15 DAY; --
       
    -- DROP EVENT proposal_Remover_id15Days; 
    SHOW EVENTS 

    */




/* // 5 SANİYE ÖRNEĞİ GÖSTERİLEBİLİR! 
CREATE EVENT test
ON SCHEDULE EVERY 5 SECOND
ON COMPLETION PRESERVE -- Çalıştıktan sonra drop olmasın
DO
   UPDATE proposal SET isActive = 1 WHERE id = 1;
   
DROP EVENT test; 
SHOW EVENTS 
*/




/*
    $query_all = $db->query("SELECT * FROM proposal");
    while($row = $query_all->fetch_assoc()) {
        $id = $row['id'];
        $set = "UPDATE proposal SET isACtive = 0 WHERE id = '$id'";
        if (!mysqli_query($db, $set)) {
            echo 'Error '.mysqli_error($db);
        }
    }
*/
    // Bugünden Proposalın oluşyutulma tarihini çıkarıcaz, sonuçtaki gün sayısı eğer > 15 ise isACtive yi 0 yapıcaz! 
    //Convert to date

    // PHP DE BU İŞLEMİ CRON JOBS ile YAPABİLİRİZ! AMA MYSQL de daha kolay olabilir

    //$datestr="2019-05-12 19:10:18";//Your date
    $now = new DateTime();
    print_r($now);
    $datestr = "14:19:00";
    $date=strtotime($datestr);//Converted to a PHP date (a second count)

    //Calculate difference
    $diff = $date - time();//time returns current time in seconds

    $days = floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
    $hours = round(($diff-$days*60*60*24)/(60*60));
    $minutes = round(($diff-$days*60*60*24)/(60*60));
    //Report
    echo "\n$days days $hours hours remain<br />";
?>