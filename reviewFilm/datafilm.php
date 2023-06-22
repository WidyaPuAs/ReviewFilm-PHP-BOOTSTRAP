<?php
    include "koneksi.php";
    $query = "select f.idfilm, f.judul, f.sinopsis, s.nama_sutradara, f.genre, f.tahun, t.nama_studio, f.poster, f.rating from film f, sutradara s, studio t where f.idsutradara=s.idsutradara and f.idstudio=t.idstudio";
    $data = mysqli_query($con, $query);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data film</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/assets/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</head>
<body>
    <table class="table" cellspacing="0" cellpadding="5" >
        <thead class='table-dark'>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Judul</th>
                <th>Sinopsis</th>
                <th>Sutradara</th>
                <th>Genre</th>
                <th>Tahun</th>
                <th>Studio</th>
                <th>Poster</th>
                <th>Rating</th>
                <th colspan="2">aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $colors = array(
                "table-primary",
                "table-secondary",
                "table-success",
                "table-danger",
                "table-warning",
                "table-info",
                "table-light"
            );

            $i = 1;
            foreach ($data as $film) {
                $acak = $i % 7;
                $color = array_values($colors)[$acak];
                
                echo "<tr class='$color'>";
                echo "<td>$i</td>";
                echo "<td>".$film['idfilm']."</td>";
                echo "<td>".$film['judul']."</td>";
                echo "<td>".$film['sinopsis']."</td>";
                echo "<td>".$film['nama_sutradara']."</td>";
                echo "<td>".$film['genre']."</td>";
                echo "<td>".$film['tahun']."</td>";
                echo "<td>".$film['nama_studio']."</td>";
                echo "<td>".$film['poster']."</td>";
                echo "<td>".$film['rating']."</td>";
                // echo "<td>
                //     <a href='editfilm.php?idfilm=".$film['idfilm']."'> edit </a> | 
                //     <a href='hapusfilm.php?idfilm=".$film['idfilm']."' onclick=\"return confirm('Apakah anda yakin akan menghapus data ini?')\"> hapus </a> 
                //     </td>";
                // echo "<td>
                // <a href='editfilm.php?idfilm=".$film['idfilm']."' class='btn btn-warning'>Edit</a></a>
                // <a href='hapusfilm.php?idfilm=".$film['idfilm']."' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#hapusmodal' data-bs-whatever='' 
                // bs-judul='$film[judul]' bs-sinopsis='$film[sinopsis]' bs-nama_sutradara='$film[nama_sutradara']
                // bs-genre='$film[genre]' bs-rating='$film[rating]' bs-idfilm='$film['idfilm']
                // bs-tahun='$film['tahun'] bs-nama_studio='$film['nama_studio'] bs-poster='$film['poster'] 
                // >Hapus</a>
                // </td>";
                echo "<td>
                    <a href='editfilm.php?idfilm=".$film['idfilm']."' class='btn btn-warning'>Edit</a>
                    <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal'
                    data-bs-idfilm='".$film['idfilm']."' data-bs-judul='".$film['judul']."' data-bs-sinopsis='".$film['sinopsis']."'
                    data-bs-nama_sutradara='".$film['nama_sutradara']."' data-bs-genre='".$film['genre']."'
                    data-bs-rating='".$film['rating']."' data-bs-tahun='".$film['tahun']."' data-bs-nama_studio='".$film['nama_studio']."'
                    data-bs-poster='".$film['poster']."' >Hapus</a>
                </td>";
                echo "</tr>";


                $i++;
            }
        ?>
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Film</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Judul: <span id="judul"></span></p>
                        <p>Sinopsis: <span id="sinopsis"></span></p>
                        <p>Studio: <span id="studio"></span></p>
                        <p>Apakah anda yakin akan menghapus film ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="#" class="btn btn-danger" id="hapus">Hapus</a>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Film</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post">
                        <div class="row mb-3">
                            <label for="inputjudul" class="col-sm-4 col-form-label">Judul Film</label>
                            <div class="col-sm-10, col-lg-5">
                                <input type="text" class="form-control" name="judul" maxlength="50" value="<?php echo $film['judul']; ?>" id="inputjudul" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputSinopsis" class="col-sm-4 col-form-label">Sinopsis Film</label>
                            <div class="col-sm-10, col-lg-5">
                                <textarea class="form-control" name="sinopsis" id="inputSinopsis" rows="5" maxlength="500" disabled><?php echo $film['sinopsis'];?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTahun" class="col-sm-4 col-form-label">Tahun Rilis</label>
                            <div class="col-sm-10, col-lg-5">
                                <input type="number" value="<?php echo $film['tahun'];?>" class="form-control" name="tahun" id="inputTahun" min="1895" max="2099" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sutradara" class="col-sm-4 col-form-label">Sutradara Film</label>
                            <div class="col-sm-10, col-lg-5">
                                <select name="sutradara" id="sutradara" class="form-select" disabled>
                                    <option value="" 
                                        <?php
                                        $querysutradara=" select * from sutradara";
                                        $datasutradara= mysqli_query($con, $querysutradara);
                                        $data2 = $film['nama_sutradara'];

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
                            <label for="genre" class="col-sm-4 col-form-label">Genre Film</label>
                            <div class="col-sm-10, col-lg-5">
                                <select class="form-select" name="genre" id="genre" disabled>
                                    <?php
                                        $genre = $film['genre'];
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
                            <label for="studio" class="col-sm-4 col-form-label">Studio Film</label>
                            <div class="col-sm-10, col-lg-5">
                                <select name="studio" id="studio" class="form-select">
                                    <option  value="" <?php
                                        $querystudio=" select * from studio";
                                        $datastudio= mysqli_query($con, $querystudio);
                                        $data3 = $film['nama_studio'];

                                        echo "<select name='studio'>";
                                            foreach ($datastudio as $rowstudio){
                                                $selected = ($rowstudio['idstudio'] == $data3) ? 'selected' : '';
                                                
                                                echo "<option value='$rowstudio[idstudio]' $selected>
                                                $rowstudio[nama_studio]</option>";
                                            }
                                        echo "</select>"; ?>
                                        >
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputposter" class="col-sm-4 col-form-label">Poster Film</label>
                            <div class="col-sm-10, col-lg-5">
                                <input type="text" class="form-control" name="poster" maxlength="50" value="<?php echo $film['poster'];?>" id="inputposter" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rating" class="col-sm-4 col-form-label">Rating Film</label>
                            <div class="col-sm-3">
                                <?php
                                    $rating = $film['rating'];
                                ?>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="rating" name="rating" value="<?php echo $film['rating'];?>" disabled>
                            </div>
                            <div class="col-sm-1">
                                <output class="form-range-value"></output>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="#" class="btn btn-danger" id="hapus">Hapus</a>
                    </div>
                </div>
            </div>
        </div>


        </tbody>
        
    </table>

    <script>
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
        keyboard: false
    });

    $(document).on("click", ".btn.btn-warning", function () {
        var idfilm = $(this).data('bs-idfilm');
        var judul = $(this).data('bs-judul');
        var sinopsis = $(this).data('bs-sinopsis');
        var sutradara = $(this).data('bs-nama_sutradara');
        var genre = $(this).data('bs-genre');
        var tahun = $(this).data('bs-tahun');
        var studio = $(this).data('bs-nama_studio');
        var poster = $(this).data('bs-poster');
        var rating = $(this).data('bs-rating');

        $("#inputjudul").text(judul);
        $("#inputSinopsis").text(sinopsis);
        $("#sutradara").text(sutradara);
        $("#genre").text(genre);
        $("#inputTahun").text(tahun);
        $("#studio").text(studio);
        $("#inputposter").html("<img src='" + poster + "' alt='" + judul + "' width='100px'>");
        $("#rating").text(rating);

        $("#hapus").attr("href", "hapusfilm.php?idfilm=" + idfilm);
        myModal.show();
    });
</script>
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