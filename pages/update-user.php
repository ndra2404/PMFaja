<?php
if(isset($_POST['submit'])){
    if($_POST['password']!=""){
        $sql = "update users set level='".$_POST['level']."', password='".md5($_POST['password'])."' where id='".$_GET['id']."'";
    }else{
        $sql = "update users set level='".$_POST['level']."' where id='".$_GET['id']."'";
    }
    insert($sql);
    echo "<script>
    swal({
        icon: 'success',
                title: 'Awesome!',
                text: 'Data berhasil diupdate',
                padding: '2em',
            }).then(function() {
                window.location ='?pages=users';
            });
    </script> ";
}
$q = mysqli_query($conn,"select * from users where id='".$_GET['id']."'");
$data = mysqli_fetch_object($q);
?>
<div class="col-md-12 justify-content-center panel mb-2">
    <div class="mb-5 flex items-center justify-between">
    <h5 class="text-lg font-semibold">Update data</h5>
    </div>
    <form action="" method="post">
    <div>
        <label for="ctnEmail">Username</label>
        <input id="ctnEmail" type="" readonly name="nama" value="<?=$data->username?>" placeholder="Indra" class="form-input" required />
    </div>
    <div>
        <label for="ctnEmail">Password</label>
        <input id="ctnEmail" type="text" name="password" placeholder="" class="form-input" required />
    </div>
    <div>
        <label for="ctnSelect">Level</label>
        <select id="ctnSelect" name="level" class="form-select text-white-dark" required>
            <option>Pilih Level</option>
            <option value="1" <?=$data->level==1?'selected':''?>>Administrator</option>
            <option value="2" <?=$data->level==2?'selected':''?>>Kepala</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary !mt-6">Submit</button>
    </form>
</div>