<?php
if(isset($_POST['submit'])){
    $sql = "update penduduk set nama_penduduk='".$_POST['nama']."'
    ,pekerjaan='".$_POST['pekerjaan']."',penghasilan='".$_POST['penghasilan']."',jml_tanggungan='".$_POST['jml_tanggungan']."',tempat_tgl='".$_POST['tempat_tgl']."',umur='".$_POST['umur']."',sts_kawin='".$_POST['sts_kawin']."'
    where id='".$_GET['id']."'";
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
$q = mysqli_query($conn,"select * from penduduk where id='".$_GET['id']."'");
$data = mysqli_fetch_array($q);
?>
<div class="col-md-12 justify-content-center panel mb-2">
    <div class="mb-5 flex items-center justify-between">
    <h5 class="text-lg font-semibold">Update data</h5>
    </div>
    <form action="" method="post">
    <div>
        <label for="ctnEmail">Nama</label>
        <input id="ctnEmail" type="text" name="nama" value="<?=$data['nama_penduduk']?>" placeholder="Indra" class="form-input" required />
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
            <option value="<?=$row['nilai']?>" <?= $data[$k['ket']]==$row['nilai']?'selected':'' ?>> <?=$row['nama']?></option>
            <?php endforeach?>
        </select>
    </div>
    <?php
        endforeach;
    ?>
    <button type="submit" name="submit" class="btn btn-primary !mt-6">Submit</button>
    </form>
</div>