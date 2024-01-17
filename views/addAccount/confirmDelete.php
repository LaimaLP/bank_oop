<div class="delete">
    <div class="delete-container">
        <h2>Are you sure?</h2>
        <div>
            <form action="<?= URL ?>/addAccount/destroy/<?=$id?>" method="post">
                <button type="submit" class="btn btn-primary">Yes</button>
            </form>
            <a href="<?= URL ?>/addAccount" class="btn btn-secondary">No</a>
        </div>

    </div>
</div>