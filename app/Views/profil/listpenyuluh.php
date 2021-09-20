<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="row">
       <h2> Daftar Penyuluh </h2>
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah Poktan</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><a href="<?= base_url('penyuluh')?>">Nandhar Mundhy</a></td>
      <td>10</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="<?= base_url('penyuluh')?>">Nandhar Mundhy</a></td>
      <td>10</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="<?= base_url('penyuluh')?>">Nandhar Mundhy</a></td>
      <td>10</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="<?= base_url('penyuluh')?>">Nandhar Mundhy</a></td>
      <td>10</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="<?= base_url('penyuluh')?>">Nandhar Mundhy</a></td>
      <td>10</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><a href="<?= base_url('penyuluh')?>">Nandhar Mundhy</a></td>
      <td>10</td>
      <td>@mdo</td>
    </tr>
   
  </tbody>
</table>

        <?php echo view('layout/footer'); ?>

    </div>
</div>

<?= $this->endSection() ?>