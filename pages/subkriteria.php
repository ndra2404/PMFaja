<?php
$kriterias = query("SELECT * FROM kriteria");
?>
<div class="col-md-12 justify-content-center panel">
    <div class="table-responsive">
        <table class="table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
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
                        <td ><?php echo $kriteria['jenis']=='cf'?'Core Factor':'Secondary Factor'?></td>
                        <td ><?php echo $kriteria['ket']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>