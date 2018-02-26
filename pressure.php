<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Метеостанция</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/zingchart.min.js"></script>
    <!-- Bootstrap core CSS -->
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Optional theme -->
    <meta http-equiv="refresh" content="360">
<!-- Latest compiled and minified JavaScript -->



    <?php 
    $db_name="Pressure";
    include 'service/getpressdata.php';?>

    <script>
        var press_today= <?php echo json_encode($press_today); ?>;
        var date_today= <?php echo json_encode($date_today); ?>;
        var press_week= <?php echo json_encode($press_week); ?>;
        var date_week= <?php echo json_encode($date_week); ?>;
        var press_mounth= <?php echo json_encode($press_mounth); ?>;
        var date_mounth= <?php echo json_encode($date_mounth); ?>;
    </script>

  </head>
  <body>

  <br>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills nav-justified">
            <li role="presentation"><a href="index.php">Сейчас</a></li>

            <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Температура <span class="caret"></span>
            </a>
              <ul class="dropdown-menu nav-justified">
                <li role="presentation"><a href="room_temp.php">Комната</a></li>
                <li role="presentation"><a href="kitchen_temp.php">Кухня</a></li>
                <li role="presentation"><a href="outside_temp.php">Улица</a></li>
              </ul>
            </li>

            <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
             Влажность <span class="caret"></span>
            </a>
              <ul class="dropdown-menu nav-justified">
                <li role="presentation"><a href="room_hum.php">Комната</a></li>
                <li role="presentation"><a href="kitchen_hum.php">Кухня</a></li>
              </ul>
            </li>

            <li role="presentation" class="active"><a href="pressure.php">Давление</a></li>
          </ul>
        </nav>
        <hr>
      </div>

      <div class="jumbotron">
        <h1>Давление</h1>
        <p class="lead">Максимальное давление за день: <?php echo $press_day_max;?> мм рт.ст.</p>
        <p class="lead">Минимальное давление за день: <?php echo $press_day_min;?> мм рт.ст.
        </p>
      </div>
      <div class="well">
        <div id="today_press">
            <script>
                zingchart.render({
                    id:"today_press",
                    width:"100%",
                    height:400,
                    data:{
                    "type":"area",
                    "title":{
                        "text":"Статистика за сегодня"
                    },
                    "scale-x":{
                        "labels":date_today,
                        "transform":{
                            "type":"date",
                            "all":"%H:%i"
                        }
                    },
                    "scale-y":{
                        "min-value":<?php echo $press_day_min;?>, //Min Value
                        "max-value":<?php echo $press_day_max;?>, //Max Value
                    },
                    "series":[
                        {
                            "values":press_today
                        }
                ]
                }
                });
            </script>
        </div>
      </div>

      <div class="well">
        <div id="week_press">
            <script>
                zingchart.render({
                    id:"week_press",
                    width:"100%",
                    height:400,
                    data:{
                    "type":"area",
                    "title":{
                        "text":"Статистика за неделю"
                    },
                    "scale-x":{
                        "labels":date_week,
                        "transform":{
                            "type":"date",
                            "all":"%d/%m"
                        }
                    },
                    "scale-y":{
                        "min-value":<?php echo $press_week_min;?>,
                        "max-value":<?php echo $press_week_max;?>,
                    },
                    "series":[
                        {
                            "values":press_week
                        }
                ]
                }
                });
            </script>
        </div>
      </div>

      <div class="well">
        <div id="mounth_press">
            <script>
                zingchart.render({
                    id:"mounth_press",
                    width:"100%",
                    height:400,
                    data:{
                    "type":"area",
                    "title":{
                        "text":"Статистика за месяц"
                    },
                    "scale-x":{
                        "labels":date_mounth,
                        "transform":{
                            "type":"date",
                            "all":"%d/%m"
                        }
                    },
                    "scale-y":{
                        "min-value":<?php echo $press_mounth_min;?>, //Min Value
                        "max-value":<?php echo $press_mounth_max;?>, //Max Value
                    },
                    "series":[
                        {
                            "values":press_mounth
                        }
                ]
                }
                });
            </script>
        </div>
      </div>

    </div> <!-- /container -->

  </body>
</html>