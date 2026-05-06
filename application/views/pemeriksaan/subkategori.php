<h3><?= $title ?></h3>
<ul>
    <?php foreach($subkategori as $s): ?>
        <li>
            <a href="<?= site_url('pemeriksaan/show_item/'.$s->id_subkategori) ?>">
                <?= $s->nama_subkategori ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
