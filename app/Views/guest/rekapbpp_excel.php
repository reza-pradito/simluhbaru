<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<center>
    <h4> Donwload Rekap Profil BPP </h4>
</center>
<br><br>
<div class="card">
    <form>
        <div class="row">
            <div class="col-md-2">
                <label for="kode_desa">Provinsi</label>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-4">
                    <select name="kode_desa" id="kode_desa" class="form-control input-sm">
                        <option value="">Pilih Provinsi</option>
                        <?php
                        foreach ($prov as $row) {
                            echo '<option value="' . $row["id_prop"] .  '">' . $row["nama_prop"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" align="center">
                    <button type="button" id="btnSave" class="btn bg-gradient-info">Download</button>
                </div>
            </div>
        </div>
    </form>
</div>
</tbody>
</table>
</div>
</div>

<?= $this->endSection() ?>


<?= $this->section('script') ?>


<?= $this->endSection() ?>