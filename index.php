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

    <link rel="apple-touch-icon" href="iphone-fav.png">

    <title>Метеостанция</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Optional theme -->
<meta http-equiv="refresh" content="360">
<!-- Latest compiled and minified JavaScript -->
<?php include 'service/db.php'; ?>
  </head>

  <body>
    <br>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills nav-justified">
            <li role="presentation" class="active"><a href="index.php">Сейчас</a></li>

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

            <li role="presentation"><a href="pressure.php">Давление</a></li>
          </ul>
        </nav>
        <hr>
      </div>

      <div class="jumbotron">
        <h1>Температура на улице: 
            <?php echo(GetLastTemp("OutsideTemp"));?>&#176; C
        </h1>
        <p class="lead">Давление: <?php echo(GetLastPress("Pressure"));?>
        мм рт.ст.
        </p>
      </div>

      <div class="row temps">
        <div class="col-lg-6">
          <div class="well">
          <h4>Температура в комнате: 
            <?php echo(GetLastTemp("room"));?>&#176; C
          </h4>
          </div>
          <div class="well">
          <h4>Влажность в комнате:
            <?php echo(GetLastHum("room"));?>
            %
          </h4>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="well">
          <h4>Температура на кухне: 
            <?php echo(GetLastTemp("kitchen"));?>&#176; C
          </h4>
          </div>
          <div class="well">
          <h4>Влажность на кухне: 
            <?php echo(GetLastHum("kitchen"));?>
            %
          </h4>
          </div>
        </div>
      </div>
      <hr>
      <footer class="footer">
        <p>Температура по состоянию на: 
          <?php echo(GetLastDate());?>
        </p>
      </footer>

    </div> <!-- /container -->
  </body>
</html>
