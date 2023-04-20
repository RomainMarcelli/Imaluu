<?php
include '../inc/fonctions.inc.php'; // des fonctions utiles
    // Restriction d'accès


    // Traitements PHP


// début des affichages
include '../inc/header.inc.php';
include '../inc/nav.inc.php';
// echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>


        <div>
            <h1>Profil</h1>
            <p>Votre profil</p>
        </div>


        <div class="row">
                <div class="col-sm-8 mx-auto">
                    <form method="post" class="border mt-5 p-3" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" id="titre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="img_principale">Image principale</label>
                            <input type="text" name="img_principale" id="img_principale" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="id_categorie">Catégorie</label>
                            <select name="id_categorie" id="id_categorie" class="form-select">
                                <?php echo $options; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contenu">Contenu</label>
                            <textarea name="contenu" id="contenu" class="form-control" rows="14"></textarea>
                        </div>
                       
                        <button type="submit" class="btn btn-outline-dark w-100">Enregistrement</button>
                    </form>
                </div>
            </div>
            <div class="row">
            <div class="col-12">
                    <table class="table table-bordered mt-5">
                        <tr>
                            <th>Id article</th>
                            <th>Id utilisateur</th>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Contenu</th>
                            <th>Image principale</th>
                            <th>Date enregistrement</th>
                            <th>Action</th>
                        </tr>
                        <?php echo $tableau; ?>
                    </table>
                </div>
            </div>
<?php
include '../inc/footer.inc.php';