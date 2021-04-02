<header class="navbar bg-primary">
    <a class="navbar-brand" href="#">
        <img src="<?php echo base_url('assets/logokancil.svg')?>" width="31" height="31" class="d-inline-block align-top" alt="">
    </a>
</header>
<nav class="navbar navbar-expand-lg navbar-light py-0 bg-secondary">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="<?php echo base_url('')?>">Beranda</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="<?php echo base_url('index.php/barang/index')?>">Produk</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="<?php echo base_url('index.php/transaksi/daftar_transaksi')?>">Laporan</a>
                    </li>
                    <li class="nav-item mx-5 active">
                        <a class="nav-link" href="<?php echo base_url('index.php/kasir')?>">Kasir</a>
                    </li>
                </ul>
            </div>
</nav>
<div class="container-fluid">
    <div class="row h-75">
        <div class="col border-right">
            <div class="d-flex flex-column p-4">
                <strong>Produk Terpilih</strong>
                <div class="d-flex p-2">
                    <table class="table table-borderless">
                    <tbody id="myTable">

                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="d-flex flex-column p-4">
                <div class="d-flex flex-column">
                    <strong>Barcode</strong>
                    <div class="form-group mt-1">
                            <input id="barcode" class="form-control" type="text" name="jumlah_barang" placeholder="Barcode Barang"/>
                        </div>
                </div>
                <div class="d-flex flex-column">
                    <strong>Nama Produk</strong>
                    <div class="form-group mt-1" id="id_barang">
                        <input id="autocomplete" class="form-control" type="text" placeholder="Nama Produk" onclick="refresh_onclick()">
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <strong>Kuantitas</strong>
                    <div class="form-group mt-1">
                        <input id="jumlah" class="form-control" type="text" name="jumlah_barang" placeholder="Kuantitas Produk"/>
                    </div>
                </div>
                <div class="d-flex">
                    <a class="btn btn-primary" onclick="tambah()">Tambah Item</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row fixed-bottom">
        <div class="col">
        
        </div>
        <div class="col-3 border-top">
            <div class="d-flex flex-column p-2">
                <div class="d-flex flex-row ">
                    <h5>Harga</h5>
                    <h4 class="ml-auto">
                        <strong id="total">0</strong>
                    </h4>
                </div>
                <div class="d-flex flex-row">
                    <div class="py-2">
                        <strong>Bayar</strong>
                    </div>
                    <div class="ml-auto">
                        <input id="bayar" class="form-control" type="text" name="jumlah_bayar" placeholder="Jumlah Bayar" oninput="update_kembalian()"/>                    
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="py-2">
                        <strong>Kembalian</strong>                   
                    </div>
                    <div class="p-2 ml-auto">
                        <strong id="kembalian">0</strong>
                    </div>
                </div>
                <a class="d-flex flex-row mt-3 p-1 justify-content-center btn btn-primary" onclick="save_transaksi()">
                    Proses
                </a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var x = 0; total = 0, list_barang = [];
    var passedarray = <?php echo json_encode($barang); ?>;
    for(var i = 0; i < passedarray.length; i++)
    {
        list_barang[i] = passedarray[i]["Nama_Barang"];
    }
    $( "#autocomplete" ).autocomplete({
        source: list_barang
    });
    function barang_compare(string1){
        for(var x = 0; x < passedarray.length; x++)
        {
            if(!string1.localeCompare(passedarray[x]["Nama_Barang"]))
            {
                return x;
            }
        }
    }

    function reset_bayartotal(){
        document.getElementById("bayar").value = new Intl.NumberFormat('de-DE').format(0);
        document.getElementById("kembalian").innerHTML = new Intl.NumberFormat('de-DE').format(0);
    }

    function update_total(value){
        document.getElementById("total").innerHTML = new Intl.NumberFormat('de-DE').format(value);
    }
    function tambah(){
        var barang = document.getElementById("autocomplete").value;
        var jumlah = document.getElementById("jumlah").value;
        if(barang == "" || jumlah == "")
        {
            alert("Form belum lengkap!");
        }
        else
        {
            var id_barang = barang_compare(barang);
            if(id_barang < 0)
            {
                alert("Barang tidak terdata!");
            }
            else
            {
                x++;
                var harga = (jumlah * passedarray[id_barang]["Harga_Jual"]);
                total += harga;
                var table = document.getElementById("myTable");
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.innerHTML = jumlah;
                cell2.innerHTML = "<div class=\"d-flex flex-column\"><div class=\"d-flex\" id=\"nama_barang\[" + (x - 1) + "\]\"><h5>"+ passedarray[id_barang]["Nama_Barang"] +"</h5></div><div class=\"d-flex flex-row\"><div>"+ passedarray[id_barang]["barcode_barang"]+"</div><div class=\"ml-2\" id=\"harga_jual\[" + (x - 1) + "\]\">"+ passedarray[id_barang]["Harga_Jual"]+ "</div></div></div>";          
                cell3.innerHTML = jumlah * passedarray[id_barang]["Harga_Jual"];
                cell4.innerHTML = "<button class=\"btn btn-primary\" onClick=\"kurang_row(" + (x - 1) + ")\"> Hapus </button>";
                update_total(total);
                reset_bayartotal();
            }
        }
    }
    function kurang_row(rownum)
    {
        var harga = document.getElementById("myTable").rows[rownum].cells[2].innerHTML;
        harga = parseInt(harga.replace(".",""));
        total -= harga;
        update_total(total);
        document.getElementById("myTable").deleteRow(rownum);
        for(let i = 0; i < x-1; i++)
        {
            document.getElementById("myTable").rows[i].cells[0].innerHTML = (i+1);
            document.getElementById("myTable").rows[i].cells[3].innerHTML = "<button class=\"btn btn-primary\" onClick=\"kurang_row(" + (i) + ")\"> Hapus </button>";
        }
        x--;
        reset_bayartotal();
    }

    function update_kembalian(){
        var jumlah_bayar = document.getElementById("bayar").value;
        document.getElementById("kembalian").innerHTML = new Intl.NumberFormat('de-DE').format(jumlah_bayar - total);
    }

    function save_transaksi()
    {
        if(document.getElementById("bayar").value == 0 || document.getElementById("bayar").value < total || total == 0)
        {
            alert(document.getElementById("bayar").innerHTML);
            alert(total);
            alert("Jumlah bayar 0 atau kurang dari total harga")
        }
        else
        {
            var daftar_barang = [];
            $('#mytable tr').each(function(index) {
                var Nama_Barang = document.getElementById("nama_barang["+ index + "]").innerHTML;
                var Harga = document.getElementById("harga_jual["+ index + "]").innerHTML;
                var Jumlah = this.cells[0].innerHTML;
                var Total = this.cells[2].innerHTML;
                daftar_barang.push({ nama_barang: Nama_Barang, harga: Harga, jumlah: Jumlah, total: Total });
            });
            var myjson = JSON.stringify(daftar_barang);
            var datatoPost = { barang: myjson, total_harga: total, bayar: document.getElementById("bayar").value};
            var request =$.ajax({
                url: "<?php echo base_url('index.php/kasir/process_json')?>",
                type: 'POST',
                data: datatoPost
            });
            request.done(function( msg ) {
                    alert("Transaksi telah diproses");
                    location.reload();
                });
                
                request.fail(function( jqXHR, textStatus ) {
                    alert( "Request failed: " + textStatus );
                });
        }
    }

    function refresh_onclick()
    {
        document.getElementById("autocomplete").value = "";
    }

</script>