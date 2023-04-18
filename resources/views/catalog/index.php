
<h1> Groups </h1>
<?php view('catalog/group-list',['groups'=> $groups ?? []]) ?>

<h2 class="mt-2"> Products </h2>
<div class="row">
    <?php foreach ($products ?? [] as $product): ?>
    <div class="col-md-4">
        <div class="card m-1">
            <div class="card-body">
                <?= $product->name ?> in group (<?= $product->id_group ?>)
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>