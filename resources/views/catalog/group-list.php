<ul class="list-group">
    <?php foreach ($groups ?? [] as $group): ?>
    <li class="list-group-item"><a href="/catalog<?= !empty($group['id'])?'?group='.$group['id']:'' ?>">(ID:<?= $group['id'] ?>) <?= $group['name'] ?> (<?= $group['count'] ?>)</a>
        <?php view('catalog/group-list',['groups'=>$group['children'] ?? []]) ?>
    </li>
    <?php endforeach; ?>
</ul>