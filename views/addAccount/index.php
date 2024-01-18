<?php require ROOT . 'views/nav.php'
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2>Accounts</h2>
        </div>
    </div>
</div>
<div class="container mt-8">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <form class="col-2" action="<?= URL ?>/addAccount/" method="get">
                        <input type="hidden" name="sort" value="<?= $sortValue ?>">
                        <button type="submit" style="background-color: transparent; 
                        border: none;text-align: center;
                         display: inline-block;
                        font-size: 16px;
                        font-weight: bold">Owner <i class="fa-solid fa-arrow-down-a-z" style="color:grey"></i></button>
                    </form>
                    <div class="col-2">
                        <b>Personal Code</b>
                    </div>
                    <div class="col-3">
                        <b>Account Number</b>
                    </div>
                    <form class="col-2" action="<?= URL ?>/addAccount/" method="get">
                        <input type="hidden" name="sort2" value="<?= $sortValue2 ?>">
                        <button type="submit" style="background-color: transparent; 
                        border: none;text-align: center;
                         display: inline-block;
                        font-size: 16px;
                        font-weight: bold">Balance <i class="fa-solid fa-arrow-down-9-1" style="color:grey"></i></button>
                    </form>
                    <div class="col-3">
                        <b>Action</b>
                    </div>
                </div>
            </div>
        </li>
        <?php foreach ($members as $member) : ?>
            <li class="list-group-item">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <?= $member->lastname . " " . $member->name  ?>
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
                                <a href="<?= URL ?>/addAccount/edit/<?= $member->id ?>" class="btn btn-outline-success btn-sm" title="Add money"><i class="fa-solid fa-circle-plus"></i></a>
                                <a href="<?= URL ?>/addAccount/withdraw/<?= $member->id ?>" class="btn btn-outline-info btn-sm" title="Withdraw money"><i class="fa-solid fa-circle-minus"></i></a>
                                <a href="<?= URL ?>/addAccount/confirmDelete/<?= $member->id ?>" class="btn btn-outline-danger btn-sm" title="Withdraw money"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
            </li>
        <?php endforeach ?>
    </ul>


</div>
</body>

</html>