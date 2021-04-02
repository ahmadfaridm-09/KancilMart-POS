<div class="col px-4 pt-4">
            <div class="d-flex semiwhite">
                <table class="table" id="myTable">
                <thead>
                    <th>No.</th>
                    <th>Barcode</th>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Keuntungan</th>
                    <th>Opsi </th>
                </thead>
                <tbody>
                <?php $i = 0?>
                    <?php foreach($barang as $barangitem): ?>
                    <tr>
                        <td><?php $i++; echo $i?> </td>
                        <td><?php echo $barangitem['barcode_barang'] ?></td>
                        <td><?php echo $barangitem['Nama_Barang'] ?></td>
                        <td><?php echo $barangitem['Harga_Beli'] ?></td>
                        <td><?php echo $barangitem['Harga_Jual'] ?></td>
                        <td><?php echo ($barangitem['Harga_Jual'] - $barangitem['Harga_Beli'])?></td>
                        <td> <a href="<?php echo base_url('index.php/barang/delete_barang/' . strval($barangitem['id_barang'] ))?>">Hapus</a> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <div class="d-flex semiwhite mt-2">
                <?php echo form_open('barang/tambah_barang')?>
                <input type="text" name="barcode" placeholder="Barcode"/>
                <input type="text" name="nama_barang" placeholder="Nama_barang"/>
                <input type="text" name="harga_beli" placeholder="Harga_Beli"/>
                <input type="text" name="harga_jual" placeholder="Harga_Jual"/>
                <input type="submit" name="submit" value="Submit">
                </form>
            </div>
                    </div>
                </div>
            </div>
        </div>