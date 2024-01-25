<div class="container mt-5">
    <div class="row">
        <div class="col-4">
            <form class="database-form" action="<?= URL ?>/addAccount" method="post">
                <h5>Select your preferred database:</h5>

                <div class="database-options">
                        <label for="maria">
                            <input type="radio" name="databasetype" value="maria" id="maria" <?= $db == DB_MARIA ? 'checked' : '' ?> />
                            MariaBase
                        </label> 
                        <label for="json">
                            <input type="radio" name="databasetype" value="json" id="json" <?= $db == DB_JSON ? 'checked' : '' ?> />
                            FileBase
                        </label>
                        <button type="submit" style="border-radius:10px; background-color:skyblue"><i class="fa-solid fa-forward"></i></button>
                </div>
            </form>

        </div>
    </div>
</div>
