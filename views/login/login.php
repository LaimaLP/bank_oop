<?php require ROOT . 'views/nav.php' ?>

<h2 style="text-align: center; margin-bottom: 50px;"> Welcome to Login </h2>
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <form action="" method="post">
            <div class="form-group">
                <label>Email address</label>
                <input required type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input required type="password"  name="password" class="form-control"placeholder="Password">
            </div>
            <button style=" margin-top: 10px" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <span>Don't have an account? </span> <a href='"<?= URL ?>/login/register'> Register</button>

    </div>