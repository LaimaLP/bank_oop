<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>" style="font-family:fantasy; font-size:30px; margin-right: 40px;"> Future Bank <i style="color:#ffda6a;" class="fa-solid fa-sack-dollar"></i></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL ?>/addAccount" title="Account List"><i class="fa-solid fa-list-ul"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>/addAccount/create" title="Add New Account"><i class="fa-solid fa-user-plus"></i></a>
                </li>
            </ul>



            <div style="display: flex; flex-direction:row; gap:20px">
                <?php if ($auth) : ?>
                    <div class="me-3">Hello, <?= $auth ?></div>
                    <form action="<?= URL ?>/logout" class="d-flex" method="post">
                        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-arrow-right-from-bracket" title="Log Out"></i></button>
                    </form>
                <?php else : ?>
                    <a href="<?= URL ?>/login" class="btn btn-outline-success">Log In</a>
                    <!-- <a href="<?= URL ?>/register" class="btn btn-outline-success">Register</a> -->
                <?php endif ?>

            </div>
        </div>
    </div>
</nav>

<?php require ROOT . 'views/message.php' ?>