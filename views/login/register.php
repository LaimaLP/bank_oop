<h2 style="text-align: center; margin-bottom: 50px;">Register to Bank</h2>
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <form action="" method="post">
            <div class="form-group">
                <label>Name</label>
                <input  required class="form-control" type="text" name="name" placeholder="Name" value="<?= isset($old_data['name']) ? $old_data['name'] : '' ?>">
            </div>
            <div class="form-group">
                <label>Email adress</label>
                <input  required class="form-control" type="email" name="email" value="<?= isset($old_data['email']) ? $old_data['email'] : '' ?>" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input  required class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Repeat Password</label>
                <input required class="form-control" type="password" name="password2" placeholder="Repeat Password">
            </div>

            <button style=" margin-top: 10px" type="submit" class="btn btn-primary">Register</button>
        </form>
        <span>Already have an account? </span> <a href='"<?= URL ?>/login/login'>  Log In</button>
