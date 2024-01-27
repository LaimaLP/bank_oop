<?php if ($db == DB_MARIA) : ?>
    <div class="col-3">
        <span id="test" class="statistics-container">Statistics from MariaBase <i class="fa-solid fa-caret-down"></i> </span>
        <div style="position:relative">
            <div id="statisticsDiv">
                <p> <b> Total Balance: </b> <?= $totalBalance ?> €. </p>
                <p> <b> Total Clients: </b> <?= $totalClient ?>. </p>
                <p> <b> Average balance in clients account: </b><?= $balanceAverage ?> €. </p>
                <p> <b> Minimum balance: </b><?= $minBalance ?> €. </p>
                <p> <b> Maximum balance: </b><?= $maxBalance ?> €. </p>
            </div>
        </div>
    </div>

<?php endif ?>



