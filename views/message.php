<?php if ($msg) : ?>
    <div style="text-align:center;">
        <a href="" style="text-decoration: none;">
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-5 ">
                        <div class="alert alert-<?= $msg['type'] ?>" role="alert">
                            <?= $msg['text'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php endif ?>