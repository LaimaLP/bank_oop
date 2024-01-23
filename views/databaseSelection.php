<?php

use Bank\App\Controllers\DBTypeController;

$DbType = DBTypeController::get();

if (isset($_SESSION['DbType'])) {
    $DbType = $_SESSION['DbType']['DbType'];
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-4">
            <form class="database-form" action="<?= URL ?>/addAccount" method="post">
                <h5>Select your preferred database:</h5>

                <div class="database-options">
                        <label for="maria">
                            <input type="radio" name="databasetype" value="maria" id="maria" <?= $DbType == 'maria' ? 'checked' : '' ?> />
                            MariaBase
                        </label> 
                        <label for="json">
                            <input type="radio" name="databasetype" value="json" id="json" <?= $DbType == 'json' ? 'checked' : '' ?> />
                            FileBase
                        </label>
                        <button type="submit" style="border-radius:10px; background-color:skyblue"><i class="fa-solid fa-forward"></i></button>
                </div>
            </form>

        </div>
    </div>
</div>
