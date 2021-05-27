<style>
    table {
        border-collapse: collapse;
        border: 1px solid #f2f5f7;
    }

    table,
    th,
    td {
        border: 1px solid grey;
        font-size: x-small;
        padding: 2px 5px;
        text-align: center;
    }

    th,

    th {
        background-color: #867ae9;
        color: white;
        padding: 8px;
    }
</style>

<h4>Laporan Pengambilan ATK</h4>
<br>
<br>
<table>
    <tr>
        <th>
            No
        </th>
        <th>
            No Urut
        </th>
        <th>
            User
        </th>
        <th>
            Nama ATK
        </th>
        <th>
            Qty
        </th>
        <th>
            Satuan
        </th>
        <th>
            Harga
        </th>
        <th>
            Keperluan
        </th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($detail as $d) : ?>
        <tr>
            <td>
                <?php echo $no; ?>
            </td>
            <td>
                <?php echo $d['no_ambilatk']; ?>
            </td>
            <td>
                <?php echo $d['user_nama']; ?>
            </td>
            <td>
                <?php echo $d['nm_barang']; ?>
            </td>
            <td>
                <?php echo $d['qty']; ?>
            </td>
            <td>
                <?php echo $d['sat']; ?>
            </td>
            <td>
                <?php echo 'Rp. ' . number_format($d['harga']); ?>
            </td>
            <td>
                <?php echo $d['keperluan']; ?>
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach; ?>
</table>