<div class="container mt-4">
    <div class="row">
        <div class="col-5">
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
                    <button type="submit" style="border-radius:10px; background-color:skyblue"><i class="fa-solid fa-angles-right"></i></button>
                </div>
            </form>
        </div>

        <?php if ($db == DB_MARIA) : ?>
            <div class="col-7">
                <div id="test" class="statistics-container"> <b>Statistics from MariaBase </b><i class="fa-solid fa-angles-right"></i></div>
                <div style="position:relative">
                    <div class = "statisticsDiv" id="statisticsDiv">
                        <p> <b> Total Balance: </b> <?= $totalBalance ?> €. </p>
                        <p> <b> Total Clients: </b> <?= $totalClient ?>. </p>
                        <p> <b> Average balance in clients account: </b><?= $balanceAverage ?> €. </p>
                        <p> <b> Minimum balance: </b><?= $minBalance ?> €. </p>
                        <p style="margin-bottom:0"> <b> Maximum balance: </b><?= $maxBalance ?> €. </p>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>