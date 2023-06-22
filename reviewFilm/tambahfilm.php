<?php
    include "koneksi.php";
    if(isset($_POST['simpan'])){
        $judul = $_POST['judul'];
        $sinopsis = $_POST['sinopsis'];
        $tahun = $_POST['tahun'];
        $sutradara = $_POST['sutradara'];
        $genre = $_POST['genre'];
        $studio = $_POST['studio'];
        $poster = $_POST['poster'];
        $rating = $_POST['rating'];
        $query = "INSERT INTO film (judul, sinopsis, tahun, idsutradara, genre, idstudio, poster, rating) values ('$judul', '$sinopsis', '$tahun', '$sutradara', '$genre', '$studio', '$poster', '$rating')";
        $simpan = mysqli_query($con, $query);
        if($simpan){
            echo "<script> alert('data film berhasil disimpan')</script>";
        }else{
            echo "<script> alert('data film gagal disimpan')</script>";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data film</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header">
            <h1 class="display-6">Tambah Film</h1>
        </div>
        <div class="card-body">
        <form action="" method="post">
        <div class="row mb-3">
            <label for="inputjudul" class="col-sm-2 col-form-label">Judul Film</label>
            <div class="col-sm-10, col-lg-5">
                <input type="text" class="form-control" name="judul" maxlength="50" id="inputjudul">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputSinopsis" class="col-sm-2 col-form-label">Sinopsis Film</label>
            <div class="col-sm-10, col-lg-5">
                <textarea class="form-control" name="sinopsis" id="inputSinopsis" rows="5" maxlength="500"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputTahun" class="col-sm-2 col-form-label">Tahun Rilis</label>
            <div class="col-sm-10, col-lg-5">
                <input type="number" class="form-control" name="tahun" id="inputTahun" min="1895" max="2099">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputsutradara" class="col-sm-2 col-form-label">Sutradara Film</label>
            <div class="col-sm-10, col-lg-5">
                <select name="sutradara" id="sutradara" class="form-select">
                    <option value=""></option>
                    <?php
                    $querysutradara = "SELECT * FROM sutradara";
                    $datasutradara = mysqli_query($con, $querysutradara);

                    while ($rowsutradara = mysqli_fetch_assoc($datasutradara)) {
                        $selected = ($rowsutradara['idsutradara'] == $_POST['sutradara']) ? 'selected' : '';
                        echo "<option value='$rowsutradara[idsutradara]' $selected> $rowsutradara[nama_sutradara]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputstudio" class="col-sm-2 col-form-label">Studio Film</label>
            <div class="col-sm-10, col-lg-5">
            <select name="studio" id="studio" class="form-select">
                    <option value=""></option>
                    <?php
                    $querystudio = "SELECT * FROM studio";
                    $datastudio = mysqli_query($con, $querystudio);

                    while ($rowstudio = mysqli_fetch_assoc($datastudio)) {
                        $selected = ($rowstudio['idstudio'] == $_POST['studio']) ? 'selected' : '';
                        echo "<option value='$rowstudio[idstudio]' $selected> $rowstudio[nama_studio]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="genre" class="col-sm-2 col-form-label">Genre Film:</label>
            <div class="col-sm-10, col-lg-5">
                <select class="form-select" name="genre" id="genre">
                    <option value="action">Action</option>
                    <option value="adventure">Adventure</option>
                    <option value="horror">Horror</option>
                    <option value="romance">Romance</option>
                    <option value="comedy">Comedy</option>
                    <option value="sci-fi">Sci-fi</option>
                    <option value="history">History</option>
                    <option value="thriller">Thriller</option>
                    <option value="drama">Drama</option>
                    <option value="animation">Animation</option>
                    <option value="family">Family</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputposter" class="col-sm-2 col-form-label">poster Film</label>
            <div class="col-sm-10, col-lg-5">
                <input type="text" class="form-control" name="poster" maxlength="50" id="inputposter">
            </div>
        </div>
        <div class="row mb-3">
            <label for="rating" class="col-sm-2 col-form-label">Rating Film:</label>
            <div class="col-sm-3">
                <input type="range" class="form-range" min="0" max="5" step="0.5" id="rating" name="rating">
            </div>
            <div class="col-sm-1">
                <output class="form-range-value"></output>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-9 ">
                <input type="submit" class="btn btn-primary" value="Save" name="simpan">
            </div>
        </div>

        </form>
    </div>
    </div>
    </div>
    <script>
        var slider = document.getElementById("rating");
        var output = document.querySelector(".form-range-value");
        output.innerHTML = slider.value;
        
        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
</body>
</html>