<?php
if(isset($_GET['id'])){
    insert("delete from penduduk where id='$_GET[id]'");
    echo "<script>location.href='?pages=penduduk';</script>";
}
$vwpenduduk = query("SELECT * FROM vw_penduduk");
?>
<div class="col-md-12 justify-content-center panel mb-2">
    <div class="table-responsive">
    <div class="mb-5 flex items-center justify-between">
    <h5 class="text-lg font-semibold">Data penduduk</h5>
        <a
            class="btn btn-info"
            href="?pages=add-data"
        >
            <span class="flex items-center">
                Add Data
            </span>
        </a>
    </div>
    <table class="table table-hover table-striped mb-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    <th>Jumlah Tangungan</th>
                    <th>Tempat Tinggal</th>
                    <th>Umur</th>
                    <th>Status Kawin</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                foreach ($vwpenduduk as $data) : ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?= $data['nama_penduduk']; ?></td>
                        <td><?= $data['pekerjaan']; ?></td>
                        <td><?= $data['penghasilan']; ?></td>
                        <td><?= $data['jml_tanggungan']; ?></td>
                        <td><?= $data['tempat_tgl']; ?></td>
                        <td><?= $data['umur']; ?></td>
                        <td><?= $data['sts_kawin']; ?></td>
                        <td>
                            <a href="?pages=update-penduduk&id=<?=$data["id"]?>" class="btn btn-info btn-sm">Update</a>
                            <a href="?pages=penduduk&id=<?=$data["id"]?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want delete data?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>