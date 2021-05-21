<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Form Permintaan ATK</h4>
                    <br>
                    <br>
                    <form action="<?= base_url('Ambil_atk/addAmbilAtk') ?>" method="POST">
                        <input type="hidden" name="nama_pt" class="form-control" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Nama PT</label>
                                    <div class="col-6">
                                        <select name="nama_pt" id="nama_pt" class="form-control" required>
                                            <option value="" selected disabled>-- SELECT --</option>
                                            <?php foreach ($pt as $p) : ?>
                                                <option value="<?= $p['alias'] ?>"><?= $p['alias'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Nama</label>
                                    <div class="col-6">
                                        <select name="user_nama" id="user_nama" class="form-control" required>
                                            <option value="<?= $this->session->userdata('userlogin') ?>"><?= $this->session->userdata('userlogin') ?></option>
                                            <?php foreach ($user_nama as $un) : ?>
                                                <option value="<?= $un['nama'] ?>"><?= $un['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border border-info">
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Nama ATK</label>
                                    <div class="col-6">
                                        <input type="hidden" id="no" class="form-control">
                                        <input type="hidden" id="getuser" class="form-control">
                                        <input type="hidden" id="getpt" class="form-control">
                                        <input type="hidden" id="getitem_kdinput" class="form-control">
                                        <input type="hidden" id="getitem_katatk" class="form-control">
                                        <input type="hidden" id="getitem_sat" class="form-control">
                                        <input type="text" id="getitematk" class="form-control mb-1" placeholder="Masukkan ATK">
                                        <input type="text" id="getitemqty" class="form-control mb-1" placeholder="Masukkan QTY">
                                        <textarea type="text" id="getitemkep" class="form-control" placeholder="Keperluan"></textarea>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-md btn-info mb-2 mr-1" type="button" data-toggle="modal" data-target="#modal-item">Pilih ATK&nbsp;&nbsp;</button>
                                        <button class="btn btn-md btn-success mb-2 mr-1" type="button" id="clickambilatk">Ambil ATK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <table class="table table-bordered w-60 table-sm" id="datatable">

                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama ATK</th>
                                    <th>Qty Input</th>
                                    <th>Kode Input ATK</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Keperluan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>
                                        <span id="nm_barang"></span>
                                        <input type="text" name="nm_barang" id="nm_barang_input">
                                    </td>
                                    <td>
                                        <span id="qty"></span>
                                    </td>
                                </tr> -->


                            </tbody>
                        </table>
                        <!-- <div class="form-group row mb-6" id="addAtk">
                            <label class="col-2 col-form-label">Nama ATK</label>
                            <div class="col-2">
                                <input type="text" class="form-control" name="nm_barang" value="">
                            </div>
                            <label class="col-1 col-form-label">Stok Qty</label>
                            <div class="input-group col-2">
                                <input type="text" class="form-control bg-light" value="">
                                <div class="input-group-append">
                                    <button href="#" class="btn btn-dark waves-effect waves-light"></button>
                                </div>
                            </div>
                            <label class="col-1 col-form-label">Get Qty</label>
                            <div class="input-group col-2">
                                <input type="text" class="form-control" name="qty" value="">
                                <div class="input-group-append">
                                    <button href="#" class="btn btn-dark waves-effect waves-light"></button>
                                </div>
                            </div>
                            <input type="hidden" name="kat_barang" class="form-control" value="">
                            <input type="hidden" name="satuan" class="form-control" value="">
                            <button type="button" class="btn btn-success btn-rounded" id="clickAddAtk"><i class="fas fa-plus"></i></button>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Keperluan</label>
                            <div class="col-6">
                                <textarea type="text" name="keperluan" class="form-control"></textarea>
                            </div>
                            <div class="col-1"></div>
                        </div> -->
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-2">
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="save">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>
</div> <!-- end col-->


<!-- SELECT MODAL -->
<div class="modal fade bd-example-modal-lg" id="modal-item" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Pilih ATK</h4>
            </div>
            <div class="modal-body">
                <table class="table table-sm nowrap table-bordered w-60" id="myTable">

                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama ATK</th>
                            <th>Qty</th>
                            <th>Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($stok_atk as $sa) { ?>

                            <?php $nm_atk = $sa['kd_inputatk']; ?>
                            <?php
                            $query = "SELECT SUM(qty) as qtyatk from tb_barang where kd_inputatk='$nm_atk'";
                            $qry = $this->db->query($query)->result_array();

                            foreach ($qry as $data) {
                                $qtyatk = $data['qtyatk'];
                            }

                            $qryambil = "SELECT SUM(qty) as qtyambil  FROM tb_ambil_atk where kd_inputatk='$nm_atk'";

                            $result2 = $this->db->query($qryambil)->result_array();
                            foreach ($result2 as $row2) {
                                $qtyambil = $row2['qtyambil'];
                            }
                            $saldo = $qtyatk - $qtyambil;

                            if ($saldo > 0) : ?>

                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $sa['nm_barang'] ?></h5>
                                    </td>

                                    <td>
                                        </i> <?= $saldo ?>
                                    </td>

                                    <td>
                                        </i> <?= $sa['satuan'] ?>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-sm btn-info btn-rounded waves-effect waves-light" id="select" data-qty="<?php echo $saldo  ?>" data-satuan="<?php echo $sa['satuan']  ?>" data-kat_barang="<?php echo $sa['kat_barang']  ?>" data-kd_inputatk="<?php echo $sa['kd_inputatk']  ?>" data-nm_barang="<?php echo $sa['nm_barang'] ?>"><i class="fas fa-check mr-1"></i>Select</button>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function addAtk() {
        $('#addAtk').append('<input type="text" class="form-control" name="nm_barang" value="">');
    }


    $(document).ready(function() {
        $(document).on('click', '#select', function() {

            var qty = $(this).data('qty');
            var nm_barang = $(this).data('nm_barang');
            var satuan = $(this).data('satuan');
            var kd_inputatk = $(this).data('kd_inputatk');
            var kat_barang = $(this).data('kat_barang');
            var user = $('#user_nama').val();
            var pt = $('#nama_pt').val();

            // $('#qty').text(qty);
            // $('#qty_input').val(qty);
            // $('#nm_barang_input').val(nm_barang);
            // $('#nm_barang').text(nm_barang);
            // $('#modal-item').modal('hide');
            $('#getuser').val(user);
            $('#getpt').val(pt);
            $('#getitematk').val(nm_barang);
            $('#getitemqty').val(qty);

            $('#getitem_kdinput').val(kd_inputatk);
            $('#getitem_katatk').val(kat_barang);
            $('#getitem_sat').val(satuan);

            $('#modal-item').modal('hide');
        });
    });

    $(function() {
        var set_number = function() {

            var table_len = $('#datatable tbody tr').length + 1;

            $('#no').val(table_len);
        }

        set_number();

        $('#clickambilatk').click(function() {

            var pt = $('#getpt').val();

            if (pt == '') {
                swal('Silahkan pilih pt');
                $('#getitematk').val('');
                $('#getitemqty').val('');
                $('#getitemkep').val('');
            } else {
                var no = $('#no').val();
                var getitematk = $('#getitematk').val();
                var getitemqty = $('#getitemqty').val();
                var getuser = $('#getuser').val();
                var get_kdinput = $('#getitem_kdinput').val();
                var get_katatk = $('#getitem_katatk').val();
                var get_sat = $('#getitem_sat').val();
                var get_kep = $('#getitemkep').val();


                $('#datatable tbody:last-child').append(
                    '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td>' + getitematk + '</td>' +
                    '<td>' + getitemqty + '</td>' +
                    '<td>' + get_kdinput + '</td>' +
                    '<td>' + get_katatk + '</td>' +
                    '<td>' + get_sat + '</td>' +
                    '<td>' + get_kep + '</td>' +
                    '</tr>'
                );

                $('#no').val('');
                $('#getitematk').val('');
                $('#getitemqty').val('');
                $('#getitemkep').val('');

                set_number();

            }



        });

        $('#save').click(function() {
            var table_data = [];

            $('#datatable tr').each(function(row, tr) {


                if ($(tr).find('td:eq(0)').text() == '') {

                } else {

                    var getuser1 = $('#getuser').val();
                    var getpt1 = $('#getpt').val();

                    var getitem_kdinput1 = $('#getitem_kdinput').val();
                    var getitem_katatk = $('#getitem_katatk').val();
                    var getitem_sat = $('#getitem_sat').val();

                    var sub = {
                        'no_ambilatk': $(tr).find('td:eq(0)').text(),
                        'nm_barang': $(tr).find('td:eq(1)').text(),
                        'qty': $(tr).find('td:eq(2)').text(),
                        'user_nama': getuser1,
                        'kd_inputatk': $(tr).find('td:eq(3)').text(),
                        'kat_barang': $(tr).find('td:eq(4)').text(),
                        'nama_pt': getpt1,
                        'sat': $(tr).find('td:eq(5)').text(),
                        'keperluan': $(tr).find('td:eq(6)').text(),
                    };

                    table_data.push(sub);
                }

            });

            // console.log(table_data);
            swal({
                title: "Add ATK",
                showCancelButton: true,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: "Save",
                cancelButtonText: "Cancel",
                buttonsStyling: true
            }).then(result => {
                if (result.value) {
                    // handle confirm
                    var data = {
                        'data_table': table_data
                    }

                    $.ajax({

                        data: data,
                        type: 'POST',
                        url: '<?php echo base_url('Ambil_atk/ambilatk'); ?>',
                        crossOrigin: false,
                        dataType: 'json',
                        success: function(result) {

                            if (result.status == "success") {
                                swal('Successfully Saved.', '', 'success');
                            } else if (result.status == 'failed') {
                                swal('Simpan gagal.', '', 'warning');
                            }
                        },
                        failure: function(result) {
                            swal(
                                "Internal Error",
                                "Oops, your note was not saved.", // had a missing comma
                                "error"
                            )
                        }
                    });
                    console.log(result.value)
                } else {
                    // handle dismiss, result.dismiss can be 'cancel', 'overlay', 'close', and 'timer'

                    console.log(result.dismiss)
                }
            })
            // swal({
            //     title: 'Ambil ATK?',
            //     text: '',
            //     type: '',
            //     // showLoaderOnConfirm: true,
            //     showCancelButton: true,
            //     confirmButtonText: 'Ya',
            //     closeOnConfirm: true,

            // }).then(function() {

            //     var data = {
            //         'data_table': table_data
            //     }

            //     $.ajax({

            //         data: data,
            //         type: 'POST',
            //         url: '<?php echo base_url('Ambil_atk/ambilatk'); ?>',
            //         crossOrigin: false,
            //         dataType: 'json',
            //         success: function(result) {

            //             if (result.status == "success") {
            //                 swal('Successfully Saved.', '', 'success');
            //             } else if (result.status == 'failed') {
            //                 swal('Simpan gagal.', '', 'warning');
            //             }
            //         },
            //         failure: function(result) {
            //             swal(
            //                 "Internal Error",
            //                 "Oops, your note was not saved.", // had a missing comma
            //                 "error"
            //             )
            //         }
            //     });
            // }, function(dismiss) {
            //     if (dismiss == "cancel") {
            //         swal(
            //             "Cancelled",
            //             "Canceled Note",
            //             "error"
            //         )
            //     }
            // })

        });

    });


    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>