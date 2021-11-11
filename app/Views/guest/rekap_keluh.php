<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<center>
    <h4> Kelembagaan Penyuluhan Pertanian Provinsi </h4>
</center>

<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <td width=23 rowspan="3" align=center class="text-uppercase text-secondary text-xxs font-weight-bolder">No</td>
                    <td width=170 rowspan="3" align=center class="text-uppercase text-secondary text-xxs font-weight-bolder">Provinsi</td>
                    <td colspan="6" align=center class="text-uppercase text-secondary text-xxs font-weight-bolder">Jumlah Kelembagaan</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2>Provinsi
                    </td>
                    <td colspan="2" class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2>Kabupaten
                    </td>
                    <td width="102" class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2>Kecamatan
                    </td>
                    <td width="102" class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2>Desa
                    </td>
                </tr>
                <tr>
                    <td width=99 class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font size="2" face="verdana">Bakorluh</font>

                    </td>
                    <td width=99 class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2><b>Dinas</b></font>
                    </td>
                    <td width=99 class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2><b>Bapeluh</b></font>
                    </td>
                    <td width=112 class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2><b>Dinas/Lainnya</b></font>
                    </td>
                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2><b>BPP</b></font>
                    </td>
                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder" align=center>
                        <font face=verdana size=2><b>Posluhdes</b></font>
                    </td>
                </tr>

            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($rkeluh as $row => $item) {
                ?>
                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                        </td>
                        <td class="align-middle text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['namaprov']; ?></p>
                        </td>
                        <td class="align-middle text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['bakor']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['dinas']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['kab_bapeluh']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['kab_dinas']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['kec_bp3k']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['posluhdes']; ?></p>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>




    </div>
</div>
</tbody>
</table>
</div>
</div>

<?= $this->endSection() ?>


<?= $this->section('script') ?>


<?= $this->endSection() ?>