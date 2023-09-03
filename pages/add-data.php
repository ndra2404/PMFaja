<?php
if(isset($_POST['submit'])){
    $sql = "insert into penduduk(nama_penduduk,pekerjaan,penghasilan,jml_tanggungan,tempat_tgl,umur,sts_kawin) values('".$_POST['nama']."'
    ,'".$_POST['pekerjaan']."','".$_POST['penghasilan']."','".$_POST['jml_tanggungan']."','".$_POST['tempat_tgl']."','".$_POST['umur']."','".$_POST['sts_kawin']."')";
    insert($sql);
    echo "<script>
    swal({
        icon: 'success',
                title: 'Awesome!',
                text: 'Data berhasil diupdate',
                padding: '2em',
            }).then(function() {
                window.location ='?pages=penduduk';
            });
    </script> ";
}
?>
<div class="col-md-12 justify-content-center panel mb-2">
    <div class="mb-5 flex items-center justify-between">
    <h5 class="text-lg font-semibold">Add data</h5>
    </div>
    <form action="" method="post">
    <div>
        <label for="ctnEmail">Nama</label>
        <input id="ctnEmail" type="text" name="nama" placeholder="Indra" class="form-input" required />
    </div>
    <?php
        $kriteria = query("select * from kriteria");
        foreach($kriteria as $k):
    ?>
    <div>
        <label for="ctnSelect<?=$k["id"]?>"><?=$k["nama"]?></label>
        <select id="ctnSelect1" name="<?=$k['ket']?>" class="form-select text-white-dark" required>
            <option>Pilih Pekerjaan</option>
            <?php
                $q = query("select * from sub_kriteria where kriteria_id = ".$k["id"]);
                foreach($q as $row):
            ?>
            <option value="<?=$row['nilai']?>"><?=$row['nama']?></option>
            <?php endforeach?>
        </select>
    </div>
    <?php
        endforeach;
    ?>
    <button type="submit" name="submit" class="btn btn-primary !mt-6">Submit</button>
    </form>
</div>