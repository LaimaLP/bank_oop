<?php require ROOT . 'views/nav.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2>Accounts</h2>
        </div>
    </div>
</div>

<ul class="list-group list-group-flush">
    <li class="list-group-item">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <b>Owner</b>
                </div>
                <div class="col-2">
                    <b>Personal Code</b>
                </div>
                <div class="col-3">
                    <b>Account Number</b>
                </div>
                <!-- Jei logIn rodom Action and Balance stulpeli. -->

                <div class="col-2">
                    <b>Balance</b>
                </div>
                <div class="col-3">
                    <b>Action</b>
                </div>

            </div>
        </div>
    </li>
    <!--  pasiimam memberiu faila, decodinam, ir toliau tikrinam kiekviena-->

    <!-- isrenkam is kiekvieno memberio jo informacijos bloka, isskaidom -->
    <?php foreach ($members as $member) : ?>
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <?= $member->name . " " . $member->lastname ?>
                    </div>
                    <div class="col-2">
                        <?= $member->PC ?>
                    </div>
                    <div class="col-3">
                        <?= $member->AC ?>

                    </div>

                    <div class="col-2">
                        <?= $member->balance ?> €
                    </div>
                    <div class="col-3">
                        <div style="display: flex;flex-direction:row; gap: 10px">
                            <!-- mygtukai nuorodos i action atvaizdavimo puslapius, per query (get metodu) perduodama memberio info (id) -->
                            <a href="<?= URL ?>/addAccount/edit/<?= $member->id ?>" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-circle-plus"></i></a>
                            <a href="<?= URL ?>/addAccount/withdraw/<?= $member->id ?>" class="btn btn-outline-info btn-sm"><i class="fa-solid fa-circle-minus"></i></a>

                            <form action="<?= URL ?>/addAccount/destroy/<?= $member->id ?>" method="post">
                                <button class="btn btn-outline-danger btn-sm"> <i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>

                    </div>
        </li>

    <?php endforeach ?>

</ul>

</body>

</html>