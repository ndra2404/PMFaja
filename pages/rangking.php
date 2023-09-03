<div class="col-md-12 justify-content-center panel mt-2">
    <div class="table-responsive">
    <h1>Hasil Akhir</h1>
    <table class="table table-hover table-striped mb-2 mt-2">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Rangking</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    $vwpenduduk = query("select * from hasil order by hasil");
                foreach ($vwpenduduk as $data) : ?>
                    <tr>
                        <td><?= $data['nama_penduduk']; ?></td>
                        <td><?=$no++?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>