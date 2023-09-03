<?php
$profil = query("SELECT k.nama as k, sk.nama as sk, sk.nilai as np FROM kriteria k INNER JOIN sub_kriteria sk ON k.id = sk.kriteria_id INNER JOIN profil_standar ps ON sk.id = ps.subkriteria_id");
$pembobotan = query("SELECT * FROM pembobotan");
?>
<div class="col-md-12 justify-content-center panel">
    <div class="text-dark mb-5  mt-4 text-center text-5xl dark:text-white-light">
                    Selamat Datang, di Aplikasi
                </div>
                <div class="text-dark mb-5  mt-4 text-center text-2xl dark:text-white-light">
                PENERAPAN METODE PROFILE MATCHING UNTUK PENGAMBILAN KEPUTUSAN PEMBERIAN DANA BANTUAN PROGRAM KELUARGA HARAPAN
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-md-8 mx-auto">
                        <ul class="list-inside list-decimal space-y-3 font-semibold">
                            <li ><b>Core factor (60%) :</b></li>
                            <li ><b>Secondar factor (40%) :</b></li>
                        </ul>
                        <p class="text-dark mb-5  mt-4 text-center text-xl dark:text-white-light">Dibawah ini adalah tabel kriteria yang diharapkan</p>
                        <table class="table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th class="text-center">Keterangan</th>
                                            <th>Gap</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($profil as $p) : ?>
                                            <tr>
                                                <td class="text-left"><?= $p['k']; ?></td>
                                                <td><?= $p['sk']; ?></td>
                                                <td><?= $p['np']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                
                        <hr>
                        <p class="text-dark mb-5  mt-4 text-center text-xl dark:text-white-light">Dibawah ini adalah tabel pembobotan</p>
                            
                                <table class="table-striped">
                                    <thead>
                                        <tr>
                                            <th>Selisih</th>
                                            <th>Bobot Nilai</th>
                                            <th class="text-center">Keterangan </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($pembobotan as $p) : ?>
                                            <tr>
                                                <td><?= $p['selisih']; ?></td>
                                                <td><?= $p['bobot']; ?></td>
                                                <td><?= $p['ket']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                    </div>
                </div>

            </div>
</div>