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
                    <div class="row">
                        <h4 class="header-title col-md-6">Form Permintaan Retur ATK</h4>
                        <div class="text-right col-md-6">
                            <h4 class="header-title" id="no_ambilatk_"><?= $no_ambilatk ?></h4>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" id="id" name="id" class="form-control" value="<?= $id ?>">
                    <input type="hidden" id="no_urut" name="no_urut" class="form-control" value="<?= $no_urut ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row mb-2">
                                <label class="col-3 col-form-label">Jenis ATK</label>
                                <div class="col-9">
                                    <input type="text" id="jenis_atk" class="form-control bg-light mb-2" placeholder="Masukkan ATK" value="<?= $nm_barang ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-3 col-form-label">Nama</label>
                                <div class="col-9">
                                    <input type="text" id="nama" class="form-control bg-light mb-2" placeholder="Masukkan ATK" value="<?= strtoupper($user_nama) ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-3 col-form-label">QTY Anda</label>
                                <div class="col-9">
                                    <input type="text" id="qty_anda" class="form-control bg-light mb-2" placeholder="Masukkan ATK" value="<?= $qty ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7 border border-secondary">
                            <div class="form-group row mb-2 px-1 py-2">
                                <div class="col-3">
                                    <label class="col-form-label">Nama ATK</label>
                                </div>
                                <div class="col-6">
                                    <input type="hidden" id="getitem_kdinput" class="form-control">
                                    <input type="hidden" id="getitem_katatk" class="form-control">
                                    <input type="hidden" id="getitem_sat" class="form-control">

                                    <input type="hidden" id="getitemharga" class="form-control">
                                    <input type="text" id="getitematk" class="form-control mb-2" placeholder="Masukkan ATK" disabled>
                                    <div class="input-group mb-1">
                                        <input type="number" class="form-control bg-light" id="getitemqty_info" id="inlineFormInputGroup" placeholder="Qty Yang Tersedia" disabled>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><span id="satuan">Sat</span></div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control" id="getitemqty" id="inlineFormInputGroup" placeholder="Masukkan Qty">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><span id="satuan_inp">Sat</span></div>
                                        </div>
                                    </div>
                                    <!-- <input type="text" id="getitemqty" class="form-control mb-1" placeholder="Masukkan QTY"> -->
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
                    <!-- <span>Anda belum menyelesaikannya</span> -->
                    <div class="table-responsive">
                        <table class="table table-bordered w-60 table-sm" id="datatable">

                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama ATK</th>
                                    <th>Qty Saat ini</th>
                                    <th>Kode Input ATK</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Harga perATK</th>
                                    <th>Keperluan</th>
                                </tr>
                            </thead>
                            <tbody id="atkterpilih">
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
                    </div>
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
                            <button onclick="deleteConfirm('<?= base_url('Ambil_atk/BatalAmbil/' . $no_ambilatk) ?>')" class="btn btn-danger waves-effect waves-light" id="batal">Batal</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light" id="save">Simpan</button>
                        </div>
                    </div>

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
                <?php if (count($stok_atk) == 0) { ?>
                    <span>Jika Data kosong, silahkan buat pengambilan ATK</span>
                <?php } ?>
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


                            $row = "SELECT SUM(qty) as qtyambil  FROM tb_detail_ambilatk where kd_inputatk='$nm_atk'";
                            $row1 = "SELECT SUM(qty_rusak) as qtyambil_rusak  FROM tb_atk_rusak where kd_inputatk='$nm_atk'";

                            $result2 = $this->db->query($row)->result_array();
                            foreach ($result2 as $row2) {
                                $qtyambil = $row2['qtyambil'];
                            }
                            $result3 = $this->db->query($row1)->result_array();
                            foreach ($result3 as $row3) {
                                $qtyambilrusak = $row3['qtyambil_rusak'];
                            }
                            $qtytotal = $qtyambilrusak + $qtyambil;
                            $saldo = $qtyatk - $qtytotal;

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
                                        <button type="button" class="btn btn-sm btn-info btn-rounded waves-effect waves-light" id="select" data-qty="<?php echo $saldo  ?>" data-ket="<?= $sa['keterangan'] ?>" data-harga="<?= $sa['harga'] ?>" data-satuan="<?php echo $sa['satuan']  ?>" data-kat_barang="<?php echo $sa['kat_barang']  ?>" data-kd_inputatk="<?php echo $sa['kd_inputatk']  ?>" data-nm_barang="<?php echo $sa['nm_barang'] ?>"><i class="fas fa-check mr-1"></i>Select</button>
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

<!-- DELETE MODAL SELURUH ATK -->
<div class="modal fade" id="deleteModalAmbil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Batal?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin ingin membatalkannya?</div>
            <div class="modal-footer">
                <button class="btn" type="button" data-dismiss="modal">Tidak jadi</button>
                <a id="btn-batal" class="btn btn-danger" href="#">Yaa</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#getitemqty').keyup(function() {
            var a = $('#getitemqty').val();
            var b = $('#getitemqty_info').val();
            var inp_1 = Number(a);
            var inp_2 = Number(b);

            if (inp_1 > inp_2) {
                swal("QTY Melebihi stok");
                $('#getitemqty').val("");
            } else {
                $('#getitemqty').val(inp_1);
            }
        });
    });
    $(document).ready(function() {
        var no_ambilatk_ = $('#no_ambilatk_').text();
        tabel_ambilatk(no_ambilatk_);

        function tabel_ambilatk(no_ambilatk_) {
            $.ajax({
                type: 'GET',
                url: '<?= base_url() ?>Retur/itemAtkGanti',
                dataType: 'JSON',
                data: {
                    no_ambilatk: no_ambilatk_
                },
                async: true,
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        var no = i + 1;
                        html += '<tr>' +
                            '<td>' + no + '</td>' +
                            '<td>' + data[i].nm_barang + '</td>' +
                            '<td>' + data[i].qty + '</td>' +
                            '<td>' + data[i].kd_inputatk + '</td>' +
                            '<td>' + data[i].kat_barang + '</td>' +
                            '<td>' + data[i].sat + '</td>' +
                            '<td>Rp. ' + data[i].harga + '</td>' +
                            '<td>' + data[i].keperluan + '</td>' +
                            '<td>' +
                            '<a class="btn btn-sm btn-danger btn-rounded waves-effect waves-light" href="javascript:;" id="batal_ambil" data="' + data[i].id_detail_ambilatk + '">X</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#atkterpilih').html(html);
                    if (data.length == 0) {
                        $('#save').hide();
                        $('#batal').hide();
                    } else {
                        $('#batal').show();
                        $('#save').show();

                    }
                }
            });
        }

        $('#clickambilatk').click(function() {

            var pt = $('#getpt').val();
            var qty = $('#getitemqty').val();
            var kep = $('#getitemkep').val();

            if (pt == '') {
                swal('Silahkan pilih pt');
                $('#getitemharga').val('');
                $('#getitematk').val('');
                $('#getitemqty').val('');
                $('#getitemkep').val('');
                $('#satuan').text('');
            } else {
                if (qty == '') {
                    swal('Maaf, QTY anda belum terisi');
                } else if (kep == '') {
                    swal('Mohon Masukkan Keperluan Anda');
                } else {
                    $('#nama_pt').prop('disabled', true);
                    $('#user_nama').prop('disabled', true);
                    var no = $('#no').val();
                    var no_ambilatk_ = $('#no_ambilatk_').text();
                    var no_urut = $('#no_urut').val();
                    var getitematk = $('#getitematk').val();
                    var getitemqty = $('#getitemqty').val();
                    var getuser = $('#getuser').val();
                    var get_kdinput = $('#getitem_kdinput').val();
                    var get_katatk = $('#getitem_katatk').val();
                    var get_sat = $('#getitem_sat').val();
                    var get_harga = $('#getitemharga').val();
                    var get_kep = $('#getitemkep').val();
                    var no_urut = $('#no_urut').val();

                    var qty_anda = Number($('#qty_anda').val());
                    var qty_fix = qty_anda + Number(getitemqty);
                    var qty_new = $('#getitemqty').val();

                    $.ajax({
                        url: "<?= base_url('Retur/atkGantiTerpilih'); ?>",
                        type: "POST",
                        data: {
                            type: 1,
                            no_urut: no_urut,
                            no_ambilatk: no_ambilatk_,
                            nm_barang: getitematk,
                            qty: qty_fix,
                            qty_new: qty_new,
                            kd_inputatk: get_kdinput,
                            kat_barang: get_katatk,
                            sat: get_sat,
                            harga: get_harga,
                            keperluan: get_kep,
                        },
                        cache: false,
                        success: function(data) {
                            // alert('success');
                            console.log(data);
                            tabel_ambilatk(no_ambilatk_);
                        }
                    });
                }
            }

            $(document).ready(function() {
                $(document).on('click', '#select', function() {

                    $('#getitemqty').val('');
                    $('#getitemkep').val('');
                    // $('#getitemkep').prop('disabled', false);

                    var qty = $(this).data('qty');
                    var nm_barang = $(this).data('nm_barang');
                    var satuan = $(this).data('satuan');
                    var kd_inputatk = $(this).data('kd_inputatk');
                    var kat_barang = $(this).data('kat_barang');
                    var harga = $(this).data('harga');
                    var keterangan = $(this).data('ket');
                    var user = $('#user_nama').val();
                    var pt = $('#nama_pt').val();

                    // $('#qty').text(qty);
                    // $('#qty_input').val(qty);
                    // $('#nm_barang_input').val(nm_barang);
                    // $('#nm_barang').text(nm_barang);
                    // $('#modal-item').modal('hide');
                    // alert(nm_barang);
                    $('#getuser').val(user);
                    $('#getpt').val(pt);
                    $('#getitematk').val(nm_barang);
                    $('#getitemqty_info').val(qty);
                    $('#satuan').text(satuan);
                    $('#satuan_inp').text(satuan);

                    $('#getitem_kdinput').val(kd_inputatk);
                    $('#getitem_katatk').val(kat_barang);

                    $('#getitemharga').val(harga);
                    $('#getitemket').val(keterangan);

                    $('#getitem_sat').val(satuan);



                    $('#modal-item').modal('hide');
                });
            });

        });

        $('#atkterpilih').on('click', '#batal_ambil', function() {
            // alert('batal');
            swal({
                title: "Anda Yakin?",
                text: "Jika anda menghapus item ini, maka anda harus mengembalikan seluruhnya.",
                type: "danger",
                showCancelButton: true,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: "Save",
                cancelButtonText: "Cancel",
                buttonsStyling: true
            }).then(result => {
                if (result.value) {
                    // update status 2 -> 1
                    var no_ambilatk_ = $('#no_ambilatk_').text();

                    var id = $(this).attr('data');
                    $.ajax({
                        dataType: 'JSON',
                        type: 'POST',
                        url: '<?= base_url('') ?>Ambil_atk/hapus_ambilatk_sem',
                        data: {
                            id: id
                        },
                        success: function() {
                            // alert('terbatal');
                            tabel_ambilatk(no_ambilatk_);
                        }
                    });
                    console.log(result.value)
                } else {
                    // handle dismiss, result.dismiss can be 'cancel', 'overlay', 'close', and 'timer'
                    console.log(result.dismiss)
                }
            });

        });

        //UPDATE STATUS 0 -> 1; WHERE no_ambilatk = ;
        //INSERT KE HEADER
        $('#save').click(function() {

            swal({
                title: "Retur ATK?",
                showCancelButton: true,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: "Save",
                cancelButtonText: "Cancel",
                buttonsStyling: true
            }).then(result => {
                if (result.value) {
                    // update status 2 -> 1
                    var id = $('#id').val();

                    $.ajax({
                        dataType: 'JSON',
                        type: 'POST',
                        data: {
                            // no_ambilatk: no_ambilatk,
                            id: id
                        },
                        url: '<?= base_url() ?>Retur/returFinish',
                        cache: false,
                        success: function(data) {
                            swal({
                                title: "Wow!",
                                text: "Anda Berhasil Mengambil ATK!",
                                type: "success"
                            }).then(function() {
                                window.location.href = '<?= base_url() ?>Retur';
                            });

                        },
                        error: function() {
                            alert('eror');
                        }
                    });
                    console.log(result.value)
                } else {
                    // handle dismiss, result.dismiss can be 'cancel', 'overlay', 'close', and 'timer'

                    console.log(result.dismiss)
                }
            });
        });


    });

    function deleteConfirm(url) {
        $('#btn-batal').attr('href', url);
        $('#deleteModalAmbil').modal();
    }
</script>

<script>
    // function addAtk() {
    //     $('#addAtk').append('<input type="text" class="form-control" name="nm_barang" value="">');
    // }

    $(document).ready(function() {
        $(document).on('click', '#select', function() {

            var qty = $(this).data('qty');
            var nm_barang = $(this).data('nm_barang');
            var satuan = $(this).data('satuan');
            var kd_inputatk = $(this).data('kd_inputatk');
            var kat_barang = $(this).data('kat_barang');
            var harga = $(this).data('harga');
            var keterangan = $(this).data('ket');
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
            $('#getitemqty_info').val(qty);
            $('#satuan').text(satuan);
            $('#satuan_inp').text(satuan);

            $('#getitem_kdinput').val(kd_inputatk);
            $('#getitem_katatk').val(kat_barang);

            $('#getitemharga').val(harga);
            $('#getitemket').val(keterangan);

            $('#getitem_sat').val(satuan);



            $('#modal-item').modal('hide');
        });
    });

    // $(function() {
    //     var set_number = function() {

    //         var table_len = $('#datatable tbody tr').length + 1;

    //         $('#no').val(table_len);
    //     }

    //     set_number();

    //     $('#clickambilatk').click(function() {

    //         var pt = $('#getpt').val();

    //         if (pt == '') {
    //             swal('Silahkan pilih pt');
    //             $('#getitemharga').val('');
    //             $('#getitematk').val('');
    //             $('#getitemqty').val('');
    //             $('#getitemkep').val('');
    //             $('#satuan').text('');
    //         } else {
    //             var no = $('#no').val();
    //             var getitematk = $('#getitematk').val();
    //             var getitemqty = $('#getitemqty').val();
    //             var getuser = $('#getuser').val();
    //             var get_kdinput = $('#getitem_kdinput').val();
    //             var get_katatk = $('#getitem_katatk').val();
    //             var get_sat = $('#getitem_sat').val();
    //             var get_harga = $('#getitemharga').val();
    //             var get_kep = $('#getitemkep').val();

    //             var harga = new Intl.NumberFormat().format(get_harga);


    //             $('#datatable tbody:last-child').append(
    //                 '<tr>' +
    //                 '<td>' + no + '</td>' +
    //                 '<td>' + getitematk + '</td>' +
    //                 '<td>' + getitemqty + '</td>' +
    //                 '<td>' + get_kdinput + '</td>' +
    //                 '<td>' + get_katatk + '</td>' +
    //                 '<td>' + get_sat + '</td>' +
    //                 '<td> Rp. ' + get_harga + '</td>' +
    //                 '<td>' + get_kep + '</td>' +
    //                 '</tr>'
    //             );

    //             $('#no').val('');
    //             $('#getitematk').val('');
    //             $('#getitemqty').val('');
    //             $('#getitemkep').val('');
    //             $('#satuan').text('');

    //             set_number();

    //         }



    //     });

    //     $('#save').click(function() {
    //         var table_data = [];

    //         $('#datatable tr').each(function(row, tr) {


    //             if ($(tr).find('td:eq(0)').text() == '') {

    //             } else {

    //                 var getuser1 = $('#getuser').val();
    //                 var getpt1 = $('#getpt').val();

    //                 var getitem_kdinput1 = $('#getitem_kdinput').val();
    //                 var getitem_katatk = $('#getitem_katatk').val();
    //                 var getitem_sat = $('#getitem_sat').val();

    //                 var sub = {
    //                     'no_ambilatk': $(tr).find('td:eq(0)').text(),
    //                     'nm_barang': $(tr).find('td:eq(1)').text(),
    //                     'qty': $(tr).find('td:eq(2)').text(),
    //                     'user_nama': getuser1,
    //                     'kd_inputatk': $(tr).find('td:eq(3)').text(),
    //                     'kat_barang': $(tr).find('td:eq(4)').text(),
    //                     'nama_pt': getpt1,
    //                     'sat': $(tr).find('td:eq(5)').text(),
    //                     'harga': $(tr).find('td:eq(6)').text(),
    //                     'keperluan': $(tr).find('td:eq(7)').text(),
    //                 };

    //                 table_data.push(sub);
    //             }

    //         });

    //         // console.log(table_data);
    //         swal({
    //             title: "Ambil ATK?",
    //             showCancelButton: true,
    //             confirmButtonColor: "#1FAB45",
    //             confirmButtonText: "Save",
    //             cancelButtonText: "Cancel",
    //             buttonsStyling: true
    //         }).then(result => {
    //             if (result.value) {
    //                 // handle confirm
    //                 var data = {
    //                     'data_table': table_data
    //                 }

    //                 $.ajax({

    //                     data: data,
    //                     type: 'POST',
    //                     url: '<?php echo base_url('Ambil_atk/ambilatk'); ?>',
    //                     crossOrigin: false,
    //                     dataType: 'json',
    //                     success: function(result) {

    //                         if (result.status == "success") {
    //                             swal('Successfully Saved.', '', 'success');
    //                         } else if (result.status == 'failed') {
    //                             swal('Simpan gagal.', '', 'warning');
    //                         }
    //                     },
    //                     failure: function(result) {
    //                         swal(
    //                             "Internal Error",
    //                             "Oops, your note was not saved.", // had a missing comma
    //                             "error"
    //                         )
    //                     }
    //                 });
    //                 console.log(result.value)
    //             } else {
    //                 // handle dismiss, result.dismiss can be 'cancel', 'overlay', 'close', and 'timer'

    //                 console.log(result.dismiss)
    //             }
    //         })
    //         // swal({
    //         //     title: 'Ambil ATK?',
    //         //     text: '',
    //         //     type: '',
    //         //     // showLoaderOnConfirm: true,
    //         //     showCancelButton: true,
    //         //     confirmButtonText: 'Ya',
    //         //     closeOnConfirm: true,

    //         // }).then(function() {

    //         //     var data = {
    //         //         'data_table': table_data
    //         //     }

    //         //     $.ajax({

    //         //         data: data,
    //         //         type: 'POST',
    //         //         url: '<?php echo base_url('Ambil_atk/ambilatk'); ?>',
    //         //         crossOrigin: false,
    //         //         dataType: 'json',
    //         //         success: function(result) {

    //         //             if (result.status == "success") {
    //         //                 swal('Successfully Saved.', '', 'success');
    //         //             } else if (result.status == 'failed') {
    //         //                 swal('Simpan gagal.', '', 'warning');
    //         //             }
    //         //         },
    //         //         failure: function(result) {
    //         //             swal(
    //         //                 "Internal Error",
    //         //                 "Oops, your note was not saved.", // had a missing comma
    //         //                 "error"
    //         //             )
    //         //         }
    //         //     });
    //         // }, function(dismiss) {
    //         //     if (dismiss == "cancel") {
    //         //         swal(
    //         //             "Cancelled",
    //         //             "Canceled Note",
    //         //             "error"
    //         //         )
    //         //     }
    //         // })

    //     });

    // });


    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>