<?php include 'db.php'; 
    /* Open connection to "zing_db" MySQL database. */
    $mysqli = connect_to_DB();
    /* Fetch result set from t_test table */
    $today_data=mysqli_query($mysqli,"SELECT * FROM ".$db_name." WHERE DateTime >= CURDATE()
        AND DateTime < CURDATE() + INTERVAL 1 DAY
        ORDER BY DateTime");
    $date_today = array();
    $press_today = array();

    while($today_row=mysqli_fetch_array($today_data)){
        $cdate = strtotime( $today_row['DateTime'] )*1000;
        array_push($date_today, $cdate);
        array_push($press_today, floatval($today_row['Press']));
    }

    $week_data=mysqli_query($mysqli,"SELECT * FROM ".$db_name." WHERE DateTime >= DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY DateTime");
    $date_week = array();
    $press_week = array();

    while($week_row=mysqli_fetch_array($week_data)){
        $cdate = strtotime( $week_row['DateTime'] )*1000;
        array_push($date_week, $cdate);
        array_push($press_week, floatval($week_row['Press']));
    }

    $mounth_data=mysqli_query($mysqli,"SELECT * FROM ".$db_name." WHERE DateTime >= DATE_SUB(NOW(), INTERVAL 4 WEEK) ORDER BY DateTime");
    $date_mounth = array();
    $press_mounth = array();

    while($mounth_row=mysqli_fetch_array($mounth_data)){
        $cdate = strtotime( $mounth_row['DateTime'] )*1000;
        array_push($date_mounth, $cdate);
        array_push($press_mounth, floatval($mounth_row['Press']));
    }

    $day_max = mysqli_query($mysqli,"SELECT MAX(Press) FROM ".$db_name." WHERE DateTime >= CURDATE() AND DateTime < CURDATE() + INTERVAL 1 DAY");
    while($day_max_row=mysqli_fetch_array($day_max)){
        $press_day_max =  number_format(floatval($day_max_row['MAX(Press)']), 2, '.', ',');;
    }

    $day_min = mysqli_query($mysqli,"SELECT MIN(Press) FROM ".$db_name." WHERE DateTime >= CURDATE() AND DateTime < CURDATE() + INTERVAL 1 DAY");
    while($day_min_row=mysqli_fetch_array($day_min)){
        $press_day_min =  number_format(floatval($day_min_row['MIN(Press)']), 2, '.', ',');;
    }

    $week_max = mysqli_query($mysqli,"SELECT MAX(Press) FROM ".$db_name." WHERE DateTime >= DATE_SUB(NOW(), INTERVAL 1 WEEK)");
    while($week_max_row=mysqli_fetch_array($week_max)){
        $press_week_max =  number_format(floatval($week_max_row['MAX(Press)']), 2, '.', ',');;
    }

    $week_min = mysqli_query($mysqli,"SELECT MIN(Press) FROM ".$db_name." WHERE DateTime >= DATE_SUB(NOW(), INTERVAL 1 WEEK)");
    while($week_min_row=mysqli_fetch_array($week_min)){
        $press_week_min =  number_format(floatval($week_min_row['MIN(Press)']), 2, '.', ',');;
    }

    $mounth_max = mysqli_query($mysqli,"SELECT MAX(Press) FROM ".$db_name." WHERE DateTime >= DATE_SUB(NOW(), INTERVAL 4 WEEK)");
    while($mounth_max_row=mysqli_fetch_array($mounth_max)){
        $press_mounth_max =  number_format(floatval($mounth_max_row['MAX(Press)']), 2, '.', ',');;
    }

    $mounth_min = mysqli_query($mysqli,"SELECT MIN(Press) FROM ".$db_name." WHERE DateTime >= DATE_SUB(NOW(), INTERVAL 4 WEEK)");
    while($mounth_min_row=mysqli_fetch_array($mounth_min)){
        $press_mounth_min =  number_format(floatval($mounth_min_row['MIN(Press)']), 2, '.', ',');;
    }

    ?>