<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>" style="font-family:fantasy; font-size:30px">  Future Bank <i style="color:#ffda6a;" class="fa-solid fa-sack-dollar"></i></a>
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL ?>/addAccount"><i class="fa-solid fa-list-ul"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>/addAccount/create"><i class="fa-solid fa-user-plus"></i></a>
                </li>
            </ul>
            <div style="display: flex; flex-direction:row; gap:20px">
               
                    <a href="<?= URL ?>/login/login.php"class="btn btn-outline-success">Log In</a>
               
                <a href="<?= URL ?>/login/regisrter.php"class="btn btn-outline-success" type="submit">Register</a>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-success" type="submit">Log Out</button>
                </form>
            </div>
            <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Log Out</button>
      </form> -->
        </div>
    </div>
</nav>