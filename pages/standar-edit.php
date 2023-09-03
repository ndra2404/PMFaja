
<?php
    $row = query("select k.id as kriteria_id,k.nama,sk.id as id_sub from profil_standar ps inner join kriteria k on ps.kriteria_id = k.id inner join sub_kriteria sk on sk.id = ps.subkriteria_id where ps.id='".$_GET['id']."'");
    $row = $row[0];
    $kriterias = query("select * from sub_kriteria where kriteria_id='".$row['kriteria_id']."'");
    if(isset($_POST['submit'])){
       $sql="update profil_standar set subkriteria_id='".$_POST['id_sub']."' where id='".$_POST['id']."'";
        $save = mysqli_query($conn,$sql);
        if($save){
            echo "<script>
            swal({
                icon: 'success',
                        title: 'Awesome!',
                        text: 'Data berhasil diupdate',
                        padding: '2em',
                    }).then(function() {
                        window.location ='?pages=standar';
                    });
            </script> ";
        }else{
            echo "<script>
            swal({
                icon: 'warning',
                        title: 'error!',
                        text: 'Data gagal diupdate',
                        padding: '2em',
                    });
            </script> ";
        }
    }
?>

<div class="col-md-12 justify-content-center panel">
    <form class="space-y-5" action="" method="post">
        <input name="id" type="hidden" value="<?=$_GET['id']?>">
        <div>
            <label for="ctnkriteria">Kriteria</label>
            <input id="ctnkriteria" type="text" readonly value="<?=$row['nama']?>" class="form-input" required />
        </div>
        <div>
            <label for="ctnSelect1">Sub Kriteria</label>
            <select id="ctnSelect1" name="id_sub" class="form-select text-white-dark" required>
                <option value="">Pilih</option>
                <?php
                    foreach($kriterias as $p):
                ?>
                <option value="<?=$p['id']?>" <?=$p['id']==$row['id_sub']?'selected':''?> ><?=$p['nama']?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="flex">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="?pages=standar" class="btn btn-danger ltr:ml-4 rtl:mr-4">Back</a>
        </div>
    </form>
</div>