<?php
    include "koneksi.php";
    $idfilm = $_GET['idfilm'];
    if(is_null($idfilm)){
        echo "<script>window.location.href='datafilm.php'</script>";
    }
    $query = "select * FROM film WHERE idfilm=$idfilm";
    $data = mysqli_query($con,$query);
    $row = $data->fetch_assoc();
    if(isset($_POST['simpan'])){
        $judul = $_POST['judul'];
        $sinopsis = $_POST['sinopsis'];
        $tahun = $_POST['tahun'];
        $sutradara = $_POST['sutradara'];
        $genre = $_POST['genre'];
        $studio = $_POST['studio'];
        $poster = $_POST['poster'];
        $rating = $_POST['rating'];
        $query = "update film set judul='$judul', sinopsis='$sinopsis', tahun='$tahun', idsutradara='$sutradara', genre='$genre', idstudio='$studio', poster='$poster', rating='$rating' where idfilm='$idfilm'";
        $simpan = mysqli_query($con, $query);
        if($simpan){
            echo "<script> alert('data film berhasil diedit')
            window.location.href='datafilm.php'</script>";
        }else{
            echo "<script> alert('data film gagal diedit')</script>";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data film</title>
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
            <h1 class="display-6">Edit Film</h1>
        </div>
        <div class="card-body">
        <form action="" method="post">
            <div class="row mb-3">
                <label for="inputjudul" class="col-sm-2 col-form-label">Judul Film</label>
                <div class="col-sm-10, col-lg-5">
                    <input type="text" class="form-control" name="judul" maxlength="50" value="<?php echo $row['judul'];?>" id="inputjudul">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputSinopsis" class="col-sm-2 col-form-label">Sinopsis Film</label>
                <div class="col-sm-10, col-lg-5">
                    <textarea class="form-control" name="sinopsis" id="inputSinopsis" rows="5" maxlength="500"><?php echo $row['sinopsis'];?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputTahun" class="col-sm-2 col-form-label">Tahun Rilis</label>
                <div class="col-sm-10, col-lg-5">
                    <input type="number" value="<?php echo $row['tahun'];?>" class="form-control" name="tahun" id="inputTahun" min="1895" max="2099">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputsutradara" class="col-sm-2 col-form-label">Sutradara Film</label>
                <div class="col-sm-10, col-lg-5">
                    <select name="sutradara" id="sutradara" class="form-select">
                        <option value="" 
                            <?php
                            $querysutradara=" select * from sutradara";
                            $datasutradara= mysqli_query($con, $querysutradara);
                            $data2 = $row ['idsutradara'];

                            echo "<select name='sutradara'>";
                                foreach ($datasutradara as $rowsutradara){
                                    $selected = ($rowsutradara['idsutradara'] == $data2) ? 'selected' : '';
                                    
                                    echo "<option value='$rowsutradara[idsutradara]' $selected> $rowsutradara[nama_sutradara]</option>";
                                }
                            echo "</select>";
                        ?>
                        ></option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="genre" class="col-sm-2 col-form-label">Genre Film</label>
                <div class="col-sm-10, col-lg-5">
                    <select class="form-select" name="genre" id="genre">
                        <?php
                            $genre = $row['genre'];
                        ?>
                        <option value="action" <?php if($genre == 'action'){echo 'selected';} ?>>Action</option>
                        <option value="adventure" <?php if($genre == 'adventure'){echo 'selected';} ?>>Adventure</option>
                        <option value="horror" <?php if($genre == 'horror'){echo 'selected';} ?>>Horror</option>
                        <option value="romance" <?php if($genre == 'romance'){echo 'selected';} ?>>Romance</option>
                        <option value="comedy" <?php if($genre == 'comedy'){echo 'selected';} ?>>Comedy</option>
                        <option value="sci-fi" <?php if($genre == 'sci-fi'){echo 'selected';} ?>>Sci-fi</option>
                        <option value="history" <?php if($genre == 'history'){echo 'selected';} ?>>History</option>
                        <option value="thriller" <?php if($genre == 'thriller'){echo 'selected';} ?>>Thriller</option>
                        <option value="drama" <?php if($genre == 'drama'){echo 'selected';} ?>>Drama</option>
                        <option value="animation" <?php if($genre == 'animation'){echo 'selected';} ?>>Animation</option>
                        <option value="family" <?php if($genre == 'family'){echo 'selected';} ?>>Family</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputstudio" class="col-sm-2 col-form-label">Studio Film</label>
                <div class="col-sm-10, col-lg-5">
                    <select name="studio" id="studio" class="form-select">
                        <option value="" <?php
                        $querystudio=" select * from studio";
                        $datastudio= mysqli_query($con, $querystudio);
                        $data3 = $row ['idstudio'];

                        echo "<select name='studio'>";
                            foreach ($datastudio as $rowstudio){
                                $selected = ($rowstudio['idstudio'] == $data3) ? 'selected' : '';
                                
                                echo "<option value='$rowstudio[idstudio]' $selected>
                                $rowstudio[nama_studio]</option>";
                            }
                        echo "</select>"; ?>></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputposter" class="col-sm-2 col-form-label">Poster Film</label>
                <div class="col-sm-10, col-lg-5">
                    <input type="text" class="form-control" name="poster" maxlength="50" value="<?php echo $row['poster'];?>" id="inputposter">
                </div>
            </div>
            <div class="row mb-3">
                <label for="rating" class="col-sm-2 col-form-label">Rating Film</label>
                <div class="col-sm-3">
                    <?php
                        $rating = $row['rating'];
                    ?>
                    <input type="range" class="form-range" min="0" max="5" step="0.5" id="rating" name="rating" value="<?php echo $row['rating'];?>">
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
    </div>
</body>
</html>