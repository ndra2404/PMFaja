<?php
$profil = query("SELECT ps.id,k.nama as k, sk.nama as sk, sk.nilai as np FROM kriteria k INNER JOIN sub_kriteria sk ON k.id = sk.kriteria_id INNER JOIN profil_standar ps ON sk.id = ps.subkriteria_id");
?>
<div class="col-md-12 justify-content-center panel">
    <div class="table-responsive">
        <table class="table-striped">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th class="text-center">Keterangan</th>
                    <th>Bobot</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profil as $p) : ?>
                    <tr>
                        <td class="text-left"><?= $p['k']; ?></td>
                        <td><?= $p['sk']; ?></td>
                        <td><?= $p['np']; ?></td>
                        <td><a href="?pages=standar-edit&id=<?=$p['id']?>" class="btn btn-primary">Update</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>