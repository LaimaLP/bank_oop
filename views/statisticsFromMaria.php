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



<!-- <div class="text-container">
    <h2> <i class="fa fa-coffee coffee" aria-hidden="true" style="font-size: 80px;"></i> Drinks</h2>
    <p class="text">Lorem ipsum
        dolor sit amet consectetur adipisicing elit. Suscipit perferendis
        ipsa, qui non minus minima sapiente laboriosam voluptatum alias <span class="dots">...</span>
         <span class="more-text">Architecto vero a quis libero quisquam fugit. Non sit pariatur recusandae dolores
            quam consequatur mollitia itaque magnam eius, beatae ducimus veritatis vel tempore ex id, ea
            reiciendis et molestiae illo maiores. Ullam maxime, officia quos voluptate quis eos laboriosam enim
            nisi hic est, et nulla
            culpa quibusdam soluta alias? </span></p>
    <button class="read-more-btn">Read More</button>
</div> -->