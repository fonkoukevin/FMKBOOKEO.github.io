<?php

use App\Entity\User;
use App\Repository\BookRepository;
use App\Entity\Author;
use App\Entity\Book;
require_once _TEMPLATEPATH_ . '/header.php';
/** @var  App\Entity\Book $book */
?>

<?php
     $id = $_GET["id"];
    $bookRepository = new BookRepository();
    $books = $bookRepository->findOneById($id);
    // $title = $books->getTitle();
     $typeName = $book->gettype()->getName();
     $authornickname = $book->getAuthor()->getFirstName();
    
    //  var_dump($authornickname);
    //  var_dump($typeName);

     if($books->getImage() !== null){
?>

<div class="row align-items-start g-5 py-5 my-5 bg-body-tertiary">
    <div class="col-10 col-sm-8 col-lg-4">
        <img src="/uploads/books/<?= $books->getImage() ?>" class="d-block mx-lg-auto img-fluid" alt="<?=$books->getTitle()?>">
    </div>
    <div class="col-lg-4">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?=$books->getTitle()?></h1>
        <p class="lead"><?= $book->getDescription() ?></p>
    </div>
    <div class="col-md-12 col-lg-4 col-xl-4">
        <?php if (User::isLogged() && User::isAdmin()) { ?>
            <div class="card mb-3">
                <div class="card-body p-4">
                    <a href="index.php?controller=book&action=edit&id=<?= $book->getId(); ?>" class="btn btn-primary">Modifier</a>
                    <a href="index.php?controller=book&action=delete&id=<?= $book->getId(); ?>" class="btn btn-primary">Supprimer</a>

                </div>
            </div>
        <?php } ?>

        <div class="card mb-3">
            <div class="card-body p-4">
                <h2>Auteur : <?= $authornickname ?></h2>
                <h2>Type : <?= $typeName ?></h2>
            </div>
        </div>
        <?php require_once _TEMPLATEPATH_ . '/book/_partial_rating.php'; ?>
    </div>
</div>

<?php } else{?>


    <div class="row align-items-start g-5 py-5 my-5 bg-body-tertiary">
    <div class="col-10 col-sm-8 col-lg-4">
        <img src="/assets/images/default-book.jpg" class="d-block mx-lg-auto img-fluid" alt="Zaï Zaï Zaï Zaï">
    </div>
    <div class="col-lg-4">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?=$books->getTitle()?></h1>
        <p class="lead"><?= $book->getDescription() ?></p>
    </div>
    <div class="col-md-12 col-lg-4 col-xl-4">
        <?php if (User::isLogged() && User::isAdmin()) { ?>
            <div class="card mb-3">
                <div class="card-body p-4">
                    <a href="index.php?controller=book&action=edit&id=<?= $book->getId(); ?>" class="btn btn-primary">Modifier</a>
                    <a href="index.php?controller=book&action=delete&id=<?= $book->getId(); ?>" class="btn btn-primary">Supprimer</a>

                </div>
            </div>
        <?php } ?>

        <div class="card mb-3">
            <div class="card-body p-4">
                <h2>Auteur : <?= $authornickname ?></h2>
                <h2>Type :  <?= $typeName ?></h2>
            </div>
        </div>
        <?php require_once _TEMPLATEPATH_ . '/book/_partial_rating.php'; ?>
    </div>
</div>

<?php } ?>


<div class="row align-items-start justify-content-center">

    <?php require_once _TEMPLATEPATH_ . '/book/_partial_comments.php'; ?>
</div>




<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>