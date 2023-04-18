
<?php view('catalog/group-list') ?>

<div class="row">
    <?php foreach ($products ?? [] as $product): ?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>