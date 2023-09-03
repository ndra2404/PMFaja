<?php
$kriterias = query("SELECT a.nama as subkri,b.nama,a.nilai FROM sub_kriteria a left join kriteria b on a.kriteria_id = b.id");
?>
<div class="col-md-12 justify-content-center panel">
    <div class="table-responsive">
        <table class="table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Sub Kriteria</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                foreach($kriterias as $kriteria) : 
                ?>
                    <tr>
                        <td class="whitespace-nowrap"><?php echo $no++?></td>
                        <td ><?php echo $kriteria['nama']?></td>
                        <td ><?php echo $kriteria['subkri']?></td>
                        <td ><?php echo $kriteria['nilai']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>