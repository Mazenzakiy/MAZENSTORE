<?php

use TechStore\Classes\Models\Catg;

 include("inc/header.php"); ?>

    <?php 
    
    if ($request->getHas('id')) {
        $id = $request->get('id');
    
    }

   $categorie = new Catg;
  $cat = $categorie->selectId($id);
    
    
    ?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Category : <?= $cat['name']?></h3>
                <div class="card">
                <?php include(APATH."inc/errors.php") ?>
                    <div class="card-body p-5">
                        <form action="<?=AURL?>handlers/edit-category.php" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?=$cat['name']?>">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="<?=AURL?>categories.php">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include("inc/footer.php"); ?>
