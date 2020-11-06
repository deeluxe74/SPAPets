<?php while($animal = $req->fetch()){

array_push($animals, $animal);   
}

foreach(array_reverse($animals) as $animal){?>
    <div class="card">
            <img class="card-img-top" src="<?= $animal['picture'] ?>" alt="animal image">
       
        <a href="../adoption.php?types=<?= $_GET['types'] ?>&age=<?= $_GET['age'] ?>&name=<?= $animal['name']?>&id=<?= $animal['id']?>">    
            <div class="card-img-overlay">
                <div class="filterOpacity">
                    <h4 class="card-title"><?= $animal['name'] ?></h4> 
                </div>    
            </div>
        </a> 
    </div>
<?php } ?>