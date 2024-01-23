<nav class="navbar navbar-expand bg-body-tertiary navas">
    <div class="container-fluid logu">
    <a class="navbar-brand" href="<?= URL ?>" style="font-family:fantasy; font-size:40px; margin:0 50px;"> Future Bank <i style="color:#ffda6a;" class="fa-solid fa-sack-dollar"></i></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
                <?php if ($auth) : ?>
                    <li class="nav-item">
                        <a style="font-size:30px;" class="nav-link active" aria-current="page" href="<?= URL ?>/addAccount" title="Account List" ><i class="fa-solid fa-list-ul" ></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="font-size:30px; margin-left:20px" class="nav-link" href="<?= URL ?>/addAccount/create" title="Add New Account"><i class="fa-solid fa-user-plus"></i></a>
                    </li>
            </ul>
            <div style="display: flex; flex-direction:row; gap:20px">
                <div class="me-3" style="font-size:25px;"> <b> Hello, <?= $auth ?> </b></div>
                <form action="<?= URL ?>/logout" class="d-flex mr-4" style="margin-right:50px" method="post">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-arrow-right-from-bracket" title="Log Out"></i></button>
                </form>
            <?php else : ?>
                <a href="<?= URL ?>/login" class="btn btn-outline-success" style = "margin-right: 50px;">Log In</a>
            <?php endif ?>
            </div>
        </div>
    </div>
</nav>

<?php require ROOT . 'views/message.php' ?>

