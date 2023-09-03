<?php
if(isset($_POST['submit'])){
    
    $sql = "insert into users(username,level,password) values('".$_POST['nama']."','".$_POST['level']."','".md5($_POST['password'])."')";
    insert($sql);
    echo "<script>
    swal({
        icon: 'success',
                title: 'Awesome!',
                text: 'Data berhasil disimpan',
                padding: '2em',
            }).then(function() {
                window.location ='?pages=users';
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
        <label for="ctnEmail">Username</label>
        <input id="ctnEmail" type="email" name="nama" placeholder="Indra" class="form-input" required />
    </div>
    <div>
        <label for="ctnEmail">Password</label>
        <input id="ctnEmail" type="text" name="password" placeholder="" class="form-input" required />
    </div>
    <div>
        <label for="ctnSelect">Level</label>
        <select id="ctnSelect" name="level" class="form-select text-white-dark" required>
            <option>Pilih Level</option>
            <option value="1">Administrator</option>
            <option value="2">Kepala</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary !mt-6">Submit</button>
    </form>
</div>