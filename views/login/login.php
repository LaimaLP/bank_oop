<div style="text-align:center;">
<h1 style="margin-top: 50px;"> Welcome to Future Bank </h1>
<h3 style="margin: 20px;"> Login </h3>
    <div class="container col-4 p-4" style="border-radius:10px; display: flex; align-items: center; justify-content: center; background-color: rgba(255, 255, 255, 0.6) ">
        <form action="<?= URL ?>/login" method="post">
            <div class="form-group">
                <label><b>Email address</b></label>
                <input required type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label><b>Password </b></label>
                <input required type="password"  name="password" class="form-control"placeholder="Password">
            </div>
            <button style=" margin-top: 10px" type="submit" class="btn btn-primary ml-6">Submit</button>
        </form>
    </div>
</div>
<?php require ROOT. 'views/message.php' ?>


