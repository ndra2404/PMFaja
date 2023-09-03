<?php
$pembobotan = query("select * from pembobotan");
$arrBobot = array();
foreach ($pembobotan as $row) {
    $arrBobot[$row['selisih']] = $row["bobot"];
}
$penduduk = query("SELECT * FROM penduduk");
$vwpenduduk = query("SELECT * FROM vw_penduduk");
$std = query("SELECT sk.nilai,sk.nama FROM profil_standar ps left join sub_kriteria sk on sk.id=ps.subkriteria_id ");
$vcf = query("select * from kriteria where jenis='cf'");
$vsf = query("select * from kriteria where jenis='sf'");
?>

<div class="col-md-12 justify-content-center panel mb-2">
    <div class="table-responsive">
    <h1 class="text-lg font-semibold">Penduduk</h1>
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
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2"><b>Yang diharapkan</b></td>
                    <?php foreach ($std as $row) : ?>
                        <td><?= $row['nama']; ?></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12 justify-content-center panel">
    <div class="table-responsive">
        <div x-data="modal" class="mb-8">
            
            <div class="flex items-right justify-end">
                <button type="button" class="btn btn-primary" @click="toggle">Kriteria</button>
            </div>
            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                        <?php
                    $kriteria = query("SELECT k.nama,sk.nama as sub,sk.nilai FROM kriteria k LEFT JOIN sub_kriteria sk ON k.id = sk.kriteria_id");
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <th>Kriteria</th>
                            <th>Sub-Kriteria</th>
                            <th>Bobot</th>
                        </thead>
                        <tbody>
                            <?php
                             foreach ($kriteria as $row) :
                            ?>
                            <tr>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['sub'] ?></td>
                                <td><?php echo $row['nilai'] ?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                        <div class="p-5">
                            <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4" @click="toggle">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="text-lg font-semibold">Score</h1>
        <table class="table table-hover table-striped">
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
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                foreach ($penduduk as $data) : ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?= $data['nama_penduduk']; ?></td>
                        <td><?= $data['pekerjaan']; ?></td>
                        <td><?= $data['penghasilan']; ?></td>
                        <td><?= $data['jml_tanggungan']; ?></td>
                        <td><?= $data['tempat_tgl']; ?></td>
                        <td><?= $data['umur']; ?></td>
                        <td><?= $data['sts_kawin']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2"><b>Yang diharapkan</b></td>
                    <?php foreach ($std as $row) : ?>
                        <td><?= $row['nilai']; ?></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>

<div class="col-md-12 justify-content-center panel mt-2">
    <div class="table-responsive">
    <h1 class="text-lg font-semibold">Pemetaan Gap</h1>
    <table class="table table-hover table-striped mb-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Pekerjaan - nilai harap</th>
                    <th>Penghasilan - nilai harap</th>
                    <th>Jumlah Tangungan - nilai harap</th>
                    <th>Tempat Tinggal - nilai harap</th>
                    <th>Umur - nilai harap</th>
                    <th>Status Kawin - nilai harap</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    mysqli_query($conn,"truncate table gap");
                foreach ($penduduk as $data) : 
                    $hPekerjaan = $data['pekerjaan']-$std[0]["nilai"];
                    $hPenghasilan = $data['penghasilan']-$std[1]["nilai"];
                    $hjml_tanggungan = $data['jml_tanggungan']-$std[2]["nilai"];
                    $htempat_tgl = $data['tempat_tgl']-$std[3]["nilai"];
                    $humur = $data['umur']-$std[4]["nilai"];
                    $hkawin = $data['sts_kawin']-$std[5]["nilai"];

                    $sql ="insert into gap(nama_penduduk,jenis_kelamin,pekerjaan,penghasilan,jml_tanggungan,tempat_tgl,umur,sts_kawin) 
                    values('".$data['nama_penduduk']."','".$data['jenis_kelamin']."','".$arrBobot[$hPekerjaan]."','".$arrBobot[$hPenghasilan]."','".$arrBobot[$hjml_tanggungan]."','".$arrBobot[$htempat_tgl]."','".$arrBobot[$humur]."','".$arrBobot[$hkawin]."')";
                    insert($sql);
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?= $data['nama_penduduk']; ?></td>
                        <td><?= $data['pekerjaan']; ?>-<?=$std[0]["nilai"]?>=<?=$hPekerjaan?></td>
                        <td><?= $data['penghasilan']; ?>-<?=$std[1]["nilai"]?>=<?=$hPenghasilan?></td>
                        <td><?= $data['jml_tanggungan']; ?>-<?=$std[2]["nilai"]?>=<?=$hjml_tanggungan?></td>
                        <td><?= $data['tempat_tgl']; ?>-<?=$std[3]["nilai"]?>=<?=$htempat_tgl?></td>
                        <td><?= $data['umur']; ?>-<?=$std[4]["nilai"]?>=<?=$humur?></td>
                        <td><?= $data['sts_kawin']; ?>-<?=$std[5]["nilai"]?>=<?=$hkawin?></td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-12 justify-content-center panel mt-2">
    <div class="table-responsive">
    <h1 class="text-lg font-semibold">Konversi Nilai Ke Bobot</h1>
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
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                $penduduk = query("select * from gap");
                foreach ($penduduk as $data) : 
                    $hPekerjaan = $data['pekerjaan'];
                    $hPenghasilan = $data['penghasilan'];
                    $hjml_tanggungan = $data['jml_tanggungan'];
                    $htempat_tgl = $data['tempat_tgl'];
                    $humur = $data['umur'];
                    $hkawin = $data['sts_kawin'];
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?= $data['nama_penduduk']; ?></td>
                        <td><?= $data['pekerjaan']; ?></td>
                        <td><?= $data['penghasilan']; ?></td>
                        <td><?= $data['jml_tanggungan']; ?></td>
                        <td><?= $data['tempat_tgl']; ?></td>
                        <td><?= $data['umur']; ?></td>
                        <td><?= $data['sts_kawin']; ?></td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12 justify-content-center panel mt-2">
    <div class="table-responsive">
    <span class="text-lg font-semibold">
    <?php
        echo "NCF : ";
        foreach($vcf as $r):
            echo $r['nama'].",";
        endforeach;
        echo "<br>";
        echo "NSF : ";
        foreach($vsf as $r):
            echo $r['nama'].",";
        endforeach;
    ?>
    </span>
    <table class="table table-border mb-2">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">Nama</th>
                    <th colspan="<?=count($vcf)+1?>" style="text-align: center;">NCF</th>
                    <th colspan="<?=count($vsf)+1?>" style="text-align: center;">NSF</th>
                    <th rowspan="2">60%*NCF+40%*NSF</th>
                </tr>
                    <?php
                        foreach($vcf as $r):
                            echo "<th>".$r['nama']."</th>";
                        endforeach;
                        echo "<th>Total</th>";
                        foreach($vsf as $r):
                            echo "<th>".$r['nama']."</th>";
                        endforeach;
                        echo "<th>Total</th>";
                    ?>
                <tr>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                $penduduk = query("select * from gap");
                mysqli_query($conn,"truncate table hasil");
                foreach ($penduduk as $data) : 
                    $cf = 0;
                    $sf = 0;
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?= $data['nama_penduduk']; ?></td>
                        <?php
                            foreach($vcf as $r):
                                $cf=$cf+$data[$r['ket']];
                                echo "<td>".$data[$r['ket']]."</td>";
                            endforeach;
                            $tcf = round($cf/count($vcf),2);
                        ?>
                        <td><?= $cf."/".count($vcf)." = ".$tcf ?></td>
                        <?php
                            foreach($vsf as $r):
                                $sf=$sf+$data[$r['ket']];
                                echo "<td>".$data[$r['ket']]."</td>";
                            endforeach;
                            $tsf = round($sf/count($vsf),2);

                            $ttlas = round(($tcf*0.60)+($tsf*0.40),2);

                            insert("insert into hasil(nama_penduduk,hasil) values ('".$data['nama_penduduk']."',".$ttlas.")");
                        ?>
                        <td><?= $sf."/".count($vsf)." = ".($tsf) ?></td>
                        <td><?=$ttlas?></td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-12 justify-content-center panel mt-2">
    <div class="table-responsive">
    <h1 class="text-lg font-semibold">Rangking</h1>
    <table class="table table-hover table-striped mb-2">
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
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("modal", (initialOpenState = false) => ({
                open: initialOpenState,
    
                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    </script>