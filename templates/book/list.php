<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<h1>Liste complète</h1>

<div class="row text-center mb-3">
    
<?php 
   function compareIdsDesc($a, $b) {
    return $b->getId() - $a->getId();
}

usort($books, 'compareIdsDesc');
foreach($books as $book){
    if($book->getImage() !== null){ ?>
     <div class="col-md-4 my-2 d-flex">
     <div class="card">
         <img src="./uploads/books/<?= $book->getImage() ?>" class="card-img-top" alt="Zaï Zaï Zaï Zaï">
         <div class="card-body">
             <h5 class="card-title"><?=$book->getTitle(); ?></h5>
             <p class="card-text"><?=$book->getDescription() ?></p>
             <a href="index.php?controller=book&amp;action=show&amp;id=<?=$book->getId() ?>" class="btn btn-primary">Lire la suite</a>
         </div>
     </div>
 </div>
<?php }else{?>
    <div class="col-md-4 my-2 d-flex">
     <div class="card">
         <img src="./uploads/books/default-book.jpg" class="card-img-top" alt="Zaï Zaï Zaï Zaï">
         <div class="card-body">
             <h5 class="card-title"><?=$book->getTitle(); ?></h5>
             <p class="card-text"><?=$book->getDescription() ?></p>
             <a href="index.php?controller=book&amp;action=show&amp;id=<?=$book->getId() ?>" class="btn btn-primary">Lire la suite</a>
         </div>
     </div>
 </div>

<?php } }?>

</div>


<!-- Génération de la pagination -->
<div class="row">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <li class="page-item <?php echo $page === $i ? 'active' : ''; ?>">
                    <a class="page-link" href="index.php?controller=book&amp;action=list&amp;page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>




<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>