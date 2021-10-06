<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png'); ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <title>
        <?= $title; ?>
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url(); ?>assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->

    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/css/soft-ui-dashboard.css'); ?>" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-100">

    <!-- Sidebar -->

    <?php echo view('layout/side'); ?>

    <!-- Main -->

    <?php echo view('layout/main'); ?>

    <!-- config template -->
    <?php echo view('layout/config_template'); ?>

    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/js/core/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/soft-ui-dashboard.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/chartjs.min.js'); ?>"></script>



    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/geodata/indonesiaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url(); ?>assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('.common_class li').click(function() {
            $('.common_class li').removeClass('active');
            $(this).addClass('active');
        })
    </script>
<script>
        $(document).ready(function() {
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            let qntYears = 80;
            let selectYear = $("#year");
            let selectMonth = $("#month");
            let selectDay = $("#day");
            let currentYear = new Date().getFullYear();

            for (var y = 0; y < qntYears; y++) {
                let date = new Date(currentYear);
                let yearElem = document.createElement("option");
                yearElem.value = currentYear
                yearElem.textContent = currentYear;
                selectYear.append(yearElem);
                currentYear--;
            }

            for (var m = 0; m < 12; m++) {
                let month = monthNames[m];
                let monthElem = document.createElement("option");
                monthElem.value = m;
                monthElem.textContent = month;
                selectMonth.append(monthElem);
            }
            var d = new Date();
            var month = d.getMonth();
            var year = d.getFullYear();
            var day = d.getDate();

            selectYear.val(year);
            selectYear.on("change", AdjustDays);
            selectMonth.val(month);
            selectMonth.on("change", AdjustDays);

            AdjustDays();
            selectDay.val(day)

            function AdjustDays() {
                var year = selectYear.val();
                var month = parseInt(selectMonth.val()) + 1;
                selectDay.empty();

                //get the last day, so the number of days in that month
                var days = new Date(year, month, 0).getDate();

                //lets create the days of that month
                for (var d = 1; d <= days; d++) {
                    var dayElem = document.createElement("option");
                    dayElem.value = d;
                    dayElem.textContent = d;
                    selectDay.append(dayElem);
                }
            }
        });
    </script>

    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 300px;
            overflow: hidden;
        }
    </style>

    <div class="penyuluhswasta">

    </div>


    <?= $this->renderSection('script') ?>


    <script>
        $("#lokasikerja").change(function() {
            if ($(this).val() == "kabupaten") {
                $('#kecamatan1Div').show();
                $('#kecamatan1').attr('required', '');
                $('#kecamatan1').attr('data-error', 'This field is required.');
                $('#kecamatan2Div').show();
                $('#kecamatan2').attr('required', '');
                $('#kecamatan2').attr('data-error', 'This field is required.');

            } else {
                $('#kecamatan1Div').hide();
                $('#kecamatan1').removeAttr('required');
                $('#kecamatan1').removeAttr('data-error');
                $('#kecamatan2Div').hide();
                $('#kecamatan2').removeAttr('required');
                $('#kecamatan2').removeAttr('data-error');

            }
        });
        $("#lokasikerja").trigger("change");
    </script>


<?php $this->renderSection('script') ?>


    <script>
        $(document).on('click', '#btn-edit', function() {
            $('.modal-body #id_swa').val($(this).data('id_swa'));
            $('.modal-body #jenis_penyuluh').val($(this).data('jenis_penyuluh'));
            $('.modal-body #noktp').val($(this).data('noktp'));
            $('.modal-body #nama').val($(this).data('nama'));
            $('.modal-body #tgl_lahir').val($(this).data('tgl_lahir'));
            $('.modal-body #bln_lahir').val($(this).data('bln_lahir'));
            $('.modal-body #thn_lahir').val($(this).data('thn_lahir'));
            $('.modal-body #tempat_lahir').val($(this).data('tempat_lahir'));
            $('.modal-body #jenis_kelamin').val($(this).data('jenis_kelamin'));
            $('.modal-body #satminkal').val($(this).data('satminkal'));
            $('.modal-body #lokasi_kerja').val($(this).data('lokasi_kerja'));
            $('.modal-body #dati2').val($(this).data('dati2'));
            $('.modal-body #kodepos').val($(this).data('kodepos'));
            $('.modal-body #kode_prop').val($(this).data('kode_prop'));
            $('.modal-body #telp').val($(this).data('telp'));
            $('.modal-body #email').val($(this).data('email'));
            $('.modal-body #nama_perusahaan').val($(this).data('nama_perusahaan'));
            $('.modal-body #alamat_perush').val($(this).data('alamat_perush'));
            $('.modal-body #telp_perush').val($(this).data('telp_perush'));
            $('.modal-body #jabatan_di_perush').val($(this).data('jabatan_di_perush'));
            $('.modal-body #tempat_tugas').val($(this).data('tempat_tugas'));
            //alert($('.modal-body #jum_anggota').val());
        })
    </script>




</body>

</html>