<?php session_start();

include('verification/verif_con.php');

?>
<!DOCTYPE html>
<html>
<!-- Cette variable créer permet d'identifié la page. L'include lui permet que le code soit plus propre et si il faut modifier un élement il sera modifier pour l'integraliter des pages. -->
<?php
include('includes/head.php');
include('verification/verif_afficher_article.php');
include('verification/verif_commentaire.php');
include('includes/fonction.php');
?>

<body>
    <?php
    include('includes/header.php');
    include('includes/nav_barre.php');
    ?>
    <main class="container">
        <h1 class="my-5 pb-3 h1 text-white d-flex justify-content-center border-bottom">Actualités des utilisateurs</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            while ($post = $AllPostTOUS->fetch()) {
            ?>
                <div class="col">
                    <div class="card">
                        <img src="/verification/upload/<?= $post['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="h3 card-title"><?= $post['titre']; ?></h5>
                            <p class="card-text"><?= $post['texte'] ?></p>
                            <p class="card-text"><small class="text-muted">Publié par : <?= $post['email'] ?></small></p>
                            <p class="card-text"><small class="text-muted"><?= modif_date($post['date'], 'date') ?></small></p>
                        </div>
                        <div class="container">
                            <form method="POST">
                                <input type="hidden" name="id_actus" value="<?= $post['id']; ?>"></input>
                                <input type="text" class="form-control mt-3" name="pseudo" placeholder="Pseudo" /> <br />
                                <textarea type="text" class="form-control" name="commentaire"></textarea> <br />
                                <input type="submit" class="btn btn-secondary" value="Envoyer" name="submit_commentaire" />
                            </form>
                            <form class="my-3" action="commentaire.php" method="GET">
                                <button type="submit" value=" <?= $post['id'] ?>" name="id_actus" class="btn btn-primary btn-sm">Commentaire(s)</button>
                            </form>
                            <?php
                            if (isset($c_erreur)) {
                                echo $c_erreur;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>