$(document).on('click', '#btn-edit', function() {
    $('.modal-body #nm-desa').val($(this).data('deskripsi'));
    $('.modal-body #nm-desa').val($(this).data('nm_desa'));
    $('.modal-body #nama').val($(this).data('nama'));
    $('.modal-body #alamat').val($(this).data('alamat'));
    $('.modal-body #ketua').val($(this).data('ketua'));
    $('.modal-body #sekretaris').val($(this).data('sekretaris'));
    $('.modal-body #bendahara').val($(this).data('bendahara'));
    $('.modal-body #tahun_berdiri').val($(this).data('tahun_berdiri'));
    $('.modal-body #jum_anggota').val($(this).data('jum_anggota'));
    $('.modal-body #penyuluh_swadaya').val($(this).data('penyuluh_swadaya'));
})