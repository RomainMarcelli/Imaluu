<?php
include '../inc/fonctions.inc.php'; // des fonctions utiles
    // Restriction d'accès


    // Traitements PHP
    include '../controller/gestion_destination.php';



// début des affichages
include '../inc/header.inc.php';
include '../inc/nav.inc.php';
// echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>


        <div>
            <h1>Gestions des destinations</h1>
            <p>Gestions</p>
        </div>


        <div class="row">
                <div class="col-sm-8 mx-auto">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" id="titre" >
                        </div>
                        <div class="mb-3">
                            <label for="img1">Image principale</label>
                            <input type="text" name="img1" id="img1" >
                        </div>
                        <div class="mb-3">
                            <label for="img2">Image secondaire</label>
                            <input type="text" name="img2" id="img2" >
                        </div>
                        <div class="mb-3">
                            <label for="img3">Image bas de page</label>
                            <input type="text" name="img3" id="img3" >
                        </div>
                        <div class="mb-3">
                            <label for="description1">Description principale</label>
                            <textarea name="description1" id="description1"  rows="14"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description2">Description secondaire</label>
                            <textarea name="description2" id="description2"  rows="14"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="map">Localisation</label>
                            <input type="text" name="map" id="map" >
                        </div>
                       
                        <button type="submit" class="btn btn-outline-dark w-100">Enregistrement</button>
                    </form>
                </div>
            </div>
            <div class="row">
            <div class="col-12">
                    <table class="table table-bordered mt-5">
                        <tr>
                            <th>Titre</th>
                            <th>Description 1</th>
                            <th>Description 2</th>
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Image 3</th>
                            <th>Localisation</th>
                            <th>Action</th>
                        </tr>
                        <?php echo $tableau; ?>
                    </table>
                </div>
            </div>
<?php
include '../inc/footer.inc.php';