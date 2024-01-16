<?php require ROOT . 'views/nav.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <form action="<?= URL ?>/addAccount/store" method="post">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 style="text-align:center">Create New Account</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-direction:column; gap:10px; align-items:center">

                            <div style="display: flex; flex-direction:column; gap:2px">
                                <label for="name"> <b>First Name: </b></label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div style="display: flex; flex-direction:column; gap:2px">
                                <label for="lastname"><b>Last Name: </b></label>
                                <input type="text" id="lastname" name="lastname" required>
                            </div>

                            <div style="display: flex; flex-direction:column; gap:2px">
                                <label for="PC"> <b>Personal Code: </b></label>
                                <input type="text" id="PC" name="PC" required>
                            </div>
                            <div style="display: flex; flex-direction:column;">
                                <label for="PC"> <b>Account Number will be: </b></label>
                            </div>
                                <span> <?= $AC ="LT" . rand(10 ** 17, 10 ** 18 - 1)?> </span>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div style="display: flex; align-items: center; justify-content: center;">
                            <button type="submit" class="btn btn-primary">Create account</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>