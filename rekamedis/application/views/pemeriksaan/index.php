<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Menu Pemeriksaan</h3>

    <?php foreach($kategori as $k_idx => $k): ?>
        <div class="mb-3">
            <button class="btn btn-primary w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#kategori<?= $k_idx ?>" aria-expanded="false">
                <?= $k->nama_kategori ?>
            </button>
            <div class="collapse mt-2" id="kategori<?= $k_idx ?>">
                <?php foreach($k->subkategori as $s): ?>
                    <div class="ms-3 mb-2">
                        <h6 class="fw-bold"><?= $s->nama_subkategori ?></h6>
                        <div class="ms-3">
                            <?php foreach($s->item as $i): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="item[]" value="<?= $i->kode_item ?>" id="item<?= $i->id_item ?>">
                                    <label class="form-check-label" for="item<?= $i->id_item ?>">
                                        <?= $i->kode_item ?><br> - <?= $i->nama_item ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
