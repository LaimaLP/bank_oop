<?php require ROOT . 'views/nav.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card mt-4" style="background-color:#edf2fae5;">
                <form action="<?= URL ?>/addAccount/update/<?= $members->id ?>" method="post">

                    <div class="card-header">
                        <h3 style="text-align:center">Withdraw funds </h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-direction:column; gap:10px; align-items:center">

                            <div style="display: flex; flex-direction:column; gap:2px">
                                <p> <b>Name: </b> <?= $members->name ?> </p>
                                <p> <b>Last Name: </b> <?= $members->lastname ?> </p>
                                <p> <b> Balance: </b> <?= number_format($members->balance, 2, '.', '')  ?> €</p>
                                <p> <b> Account Number: </b> <?= $members->AC ?></p>

                                <input type="text" name="withdraw" required placeholder="Enter amount">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="text-align: center;">
                    <a class="btn btn-primary btn-sm" href="<?= URL ?>/addAccount"title="Back"> <i class="fa-solid fa-backward"></i></a>
                        <button class="btn btn-primary btn-sm" type="submit">Withdraw</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

