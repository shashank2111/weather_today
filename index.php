<?php
    $weather1 = "";
    $error = "";
    if($_GET['city']){
      $_GET['city'] = str_replace(' ','-',$_GET['city']);
      while(substr($_GET['city'],-1) == '-')
      { $_GET['city'] = substr($_GET['city'],0,-1);}
      $city = $_GET['city'];
      }
      // $file_headers = @get_headers($page);
      // // if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
      // //     $error.="This city could not be found";
      // // }
      // if($file_headers[0] != 'HTTP/1.1 404 Not Found'){
      $page = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest"); 
      $pagearr = explode('Weather Today</h2> (1–3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">',$page);

      $firstpagearr = explode('</span></p></td><td class="b-forecast__table-description-cell--js" colspan="9"><div class="b-forecast__table-description-title"><h2>',$pagearr[1]);
      $weather1.= $firstpagearr[0]; 
      // }
      // elseif(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found'){
        // $error.="This city could not be found";

      // }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <title>Weather Scraper</title>
    <style type = "text/css">
        html { 
          background: url(nature.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        body{
          background: none;
        }
        #container{
          margin: auto;
          width: 450px;
          text-align: center;
          margin-top: 230px;
        }
        #textarea1{
          height: 40px;
          
          border-radius: 3px;
          resize: none;
        }
    </style>
  </head>
  <body>
    <div id="container">
      <h1>What's the weather?</h1>
      <!-- <label for="textarea1" id = text></label> -->
      <form class="form-group">
        <label for="textarea1">Enter the name of city.</label>
        <!-- <small id="emailHelp" class="form-text text-muted">Enter the name of city.</small> -->
        <input type="text" class="form-control" name = "city" id="textarea1"      aria-describedby="emailHelp"><br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        <div id = "result">
          <?php 
            if($weather1!="")
            echo '<div class="alert alert-primary" role="alert">'.$weather1.'</div>';
            // elseif($error)
            // {
            //   echo '<div class="alert alert-danger" role="alert">'.$error.'
            // </div>';
            // }    
          ?> 
        </div>

      </div>
      
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>