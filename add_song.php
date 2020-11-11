<?php

session_start();
require('db.php');

function alert($message){
    echo "<script>alert('".$message."')</script>";
}

if(isset($_POST)){
    // $file = $_FILES['song']['temp_name'];
    $song_info = pathinfo(basename($_FILES["song"]["name"]));
    $song_extension = $song_info["extension"];
    $song_dir = "data/tracks/";
    $song_id = uniqid('song_');
    $song_target_file = $song_dir . $song_id .".". $song_extension;
    $cover_info = pathinfo(basename($_FILES["song_cover_image"]["name"]));
    $cover_extension = $cover_info["extension"];
    $cover_dir = "data/tracks/";
    $cover_id = uniqid('cover_');
    $cover_target_file = $cover_dir . $cover_id .".". $cover_extension;
    $title = $_POST['title'];
    $artist_id = $_POST['artist'];
    $album_id = $_POST['album'];
?>
    <script>
        const posted_by = JSON.parse(localStorage.getItem(user)).user_id;
    </script>
<?php
    // $posted_by = posted_by;

    // add song to DB
    if (move_uploaded_file($_FILES["song"]["tmp_name"], $song_target_file)) {
        alert("The file ". htmlspecialchars( basename( $_FILES["song"]["name"])). " has been uploaded.");
    } else {
        alert("Sorry, there was an error uploading your file.");
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Add Song</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="bg-dark">
        <div class="container text-white d-flex justify-content-center align-items-center" style="height: 100vh">
            <form class="" method="POST" action="#" enctype="multipart/form-data">
                <h1>Add a New Song</h1>
                <hr style="background: white; max-width: 450px" class="my-4">
                <img src="" id="cover_preview" alt="" style="max-width: 450px; max-height: 400px">
                <div class="form-row">
                    <div class="input-group col-md-12 my-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Cover Image</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="song_cover_image" id="song_cover_image"
                            aria-describedby="inputGroupFileAddon01" required>
                            <label class="custom-file-label" for="song_cover_image">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="title">Name / Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="artist">Artist</label>
                        <select id="artist" name="artist" class="form-control" required>
                            <?php
                                $artist_sql = "SELECT * FROM `artists`";
                                $artist_res = mysqli_query($conn, $artist_sql);
                                while($artist = mysqli_fetch_assoc($artist_res)){
                                    echo "<option value='".$artist['artist_id']."'>".$artist['artist_first_name']." ".$artist['artist_last_name']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="album">Album</label>
                        <select id="album" name="album" class="form-control" required>
                            <?php
                                $album_sql = "SELECT * FROM `albums`";
                                $album_res = mysqli_query($conn, $album_sql);
                                while($album = mysqli_fetch_assoc($album_res)){
                                    echo "<option value='".$album['album_id']."'>".$album['album_name']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group col-md-12 my-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon02">Upload Song</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="song" id="song"
                            aria-describedby="inputGroupFileAddon02">
                            <label class="custom-file-label" for="song">Choose file</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-light">Add</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $('.custom-file-input').on('change', function() { 
            let fileName = $(this).val().split('\\').pop(); 
            $(this).next('.custom-file-label').addClass("selected").html(fileName); 
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#cover_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#song_cover_image").change(function(){
            readURL(this);
        });
    </script>
</body>

</html>