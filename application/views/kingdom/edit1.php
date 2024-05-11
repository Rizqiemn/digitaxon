<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat</title>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-body">

                    <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                    <b><?= $barang['nama_barang']; ?></b>
                    <br>


                    Keterangan Barang :

                    <b><?= $barang['ket_barang']; ?></b>
                    <br>
                    Harga Barang:

                    <b>Rp. <?= number_format($barang['harga_jual']); ?></b>

                </div>
            </div>
        </div>
    </div>
</body>

</html>