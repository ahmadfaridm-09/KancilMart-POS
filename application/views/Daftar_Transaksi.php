<div class="col px-4 pt-4">
            <div class="d-flex semiwhite p-5">
                <h4>Keuntungan perhari</h4>
            </div>
            <div class="d-flex semiwhite">
            <table id="myTable" class="table">
                <thead>
                    <th>No.</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Transaksi</th>
                    <th>Total Bayar</th>
                    <th>Keuntungan</th>
                </thead>
                <tbody>
                <?php $i = 0?>
                    <?php foreach($perhari as $transperhari): ?>
                        <tr>
                            <td><?php $i++; echo $i?> </td>
                            <td><?php echo $transperhari['tanggal_transaksi'] ?></td>
                            <td><?php echo $transperhari['total_transaksi'] ?></td>
                            <td><?php echo $transperhari['total_harga'] ?></td>
                            <td><?php echo 0?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <div class="d-flex semiwhite mt-5 p-5">
                <h4>Transaksi</h4>
            </div>
            <div class="d-flex semiwhite">
                <table  id="myTable" class="table">
                <thead>
                    <th>No.</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Barang</th>
                    <th>Total Harga</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                </thead>
                <tbody>
                <?php $i = 0?>
                    <?php foreach($transaksi as $transaksiitem): ?>
                        <?php $transaksi_json = json_decode($transaksiitem['nama_barang'],true);?>
                    <tr>
                        <td><?php $i++; echo $i?> </td>
                        <td><?php echo $transaksiitem['id_transaksi'] ?></td>
                        <td><?php echo $transaksiitem['tanggal_transaksi'] ?></td>
                        <td><?php foreach($transaksi_json as $transaksi_json_item): ?>
                        <?php echo $transaksi_json_item['nama_barang']."(".$transaksi_json_item['harga'].")"." x".$transaksi_json_item['jumlah']." (Total: ".$transaksi_json_item['total'].")"?> <br>
                        <?php endforeach; ?>
                        </td>
                        <td><?php echo $transaksiitem['total_harga'] ?></td>
                        <td><?php echo $transaksiitem['bayar'] ?></td>
                        <td><?php echo ($transaksiitem['bayar'] - $transaksiitem['total_harga'])?></td>
                        <td> <a href="<?php echo base_url('index.php/transaksi/delete_transaksi/' . strval($transaksiitem['id_transaksi'] ))?>">Hapus</a> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
                    </div>
                </div>
            </div>
        </div>