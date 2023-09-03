<?php
if(isset($_GET['id'])){
    insert("delete from users where id='$_GET[id]'");
    echo "<script>location.href='?pages=users';</script>";
}
?>
<div class="col-md-12 justify-content-center panel mt-2">
    <div class="table-responsive">
    <div class="mb-5 flex items-center justify-between">
    <h5 class="text-lg font-semibold">Users</h5>
        <a
            class="btn btn-info"
            href="?pages=add-user"
        >
            <span class="flex items-center">
                Add Data
            </span>
        </a>
    </div>
    <table class="table table-hover table-striped mb-2 mt-2">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Level</th>
                    <th width="70"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    $vwpenduduk = query("select * from users");
                foreach ($vwpenduduk as $data) : ?>
                    <tr>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['level']==1?'administrator':'Kepala'; ?></td>
                        <td>
                            <a href="?pages=update-user&id=<?=$data["id"]?>" class="btn btn-info btn-sm">Update</a>
                            <a href="?pages=users&id=<?=$data["id"]?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want delete data?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>