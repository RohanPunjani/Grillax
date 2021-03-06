<?php

session_start();
$conn = mysqli_connect("localhost","root","","grillax_test");

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Testing</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="text-center">
              <h1>Hello</h1>
              <p>Please fill the form :)</p>
                <?php
                if(isset($_POST)){
                    // $file = $_FILES['song']['temp_name'];
                    $info = pathinfo(basename($_FILES["song"]["name"]));
                    $extension = $info["extension"];
                    $target_dir = "./data/tracks/";
                    $song_id = uniqid('song_');
                    $target_file = $target_dir . $song_id .".". $extension;
                    if (move_uploaded_file($_FILES["song"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["song"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                ?>
              <br>
              <br>
              <form action="#" method='post' enctype="multipart/form-data">
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="song_title">Song Title</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Bla bla bla" aria-label="Bla bla bla" aria-describedby="song_title">
                  </div>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="song_author">Song Author</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Example placeholder" aria-label="Example placeholder" aria-describedby="song_author">
                  </div>
                  <input type="file" name="song"><br>
                  <br>
                  <button type="submit">Submit</button>
                  <button type="clear">Clear</button>
              </form>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    </script>
  </body>
</html>