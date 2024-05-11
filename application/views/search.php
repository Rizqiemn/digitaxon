<div class="container " style="margin-top: 50px">

    <form action="<?= base_url('Search') ?>" method="get">
        <div class="input-group">
            <select class="form-select" name="tabel">
                <option disabled selected value>Pilih Jenis Takson</option>
                <option value="kingdom_bio">Kingdom</option>
                <option value="filum_bio">filum</option>
                <option value="kelas_bio">kelas</option>
                <option value="ordo_bio">ordo</option>
                <option value="famili_bio">famili</option>
            </select>
            <input type="text" class="form-control form-control-lg" name="keyword" placeholder="Masukan Kata Kunci...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Cari</button>
            </span>
        </div>
    </form>
    <div class="text-center">
        <h3>Data Takson</h3>
        <?php if (!empty($keyword)) { ?>
            <p style="color:orange"><b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b></p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Urutan Takson</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!is_null($tabel)) { ?>
                        <?php foreach ($data as $row) { ?>
                            <tr>
                                <?php if ($tabel == 'kingdom_bio') { ?>
                                    <th scope="row"><?= $row['kode_kingdom'] ?></th>
                                    <td><?= $row['nama_kingdom'] ?></td>
                                    <td><?= $row['ket_kingdom'] ?></td>
                                    <td>-</td>
                                <?php } elseif ($tabel == 'filum_bio') { ?>
                                    <th scope="row"><?= $row['kode_filum'] ?></th>
                                    <td><?= $row['nama_filum'] ?></td>
                                    <td><?= $row['ket_filum'] ?></td>
                                    <td><?= $row['nama_kingdom'] ?></td>
                                <?php } elseif ($tabel == 'kelas_bio') { ?>
                                    <th scope="row"><?= $row['kode_kelas'] ?></th>
                                    <td><?= $row['nama_kelas'] ?></td>
                                    <td><?= $row['ket_kelas'] ?></td>
                                    <td><?= $row['nama_kingdom'] . '>' . $row['nama_filum'] ?></td>
                                <?php } elseif ($tabel == 'ordo_bio') { ?>
                                    <th scope="row"><?= $row['kode_ordo'] ?></th>
                                    <td><?= $row['nama_ordo'] ?></td>
                                    <td><?= $row['ket_ordo'] ?></td>
                                    <td><?= $row['nama_kingdom'] . '>' . $row['nama_filum'] . '>' . $row['nama_kelas'] ?></td>
                                <?php } elseif ($tabel == 'famili_bio') { ?>
                                    <th scope="row"><?= $row['kode_famili'] ?></th>
                                    <td><?= $row['nama_famili'] ?></td>
                                    <td><?= $row['ket_famili'] ?></td>
                                    <td><?= $row['nama_kingdom'] . '>' . $row['nama_filum'] . '>' . $row['nama_kelas'] . '>' . $row['nama_ordo'] ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <h1>Pilih dulu taksonnya.</h1>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Urutan Takson</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!is_null($tabel)) { ?>
                        <?php foreach ($data as $row) { ?>
                            <tr>
                                <?php if ($tabel == 'kingdom_bio') { ?>
                                    <th scope="row"><?= $row['kode_kingdom'] ?></th>
                                    <td><?= $row['nama_kingdom'] ?></td>
                                    <td><?= $row['ket_kingdom'] ?></td>
                                    <td>-</td>
                                <?php } elseif ($tabel == 'filum_bio') { ?>
                                    <th scope="row"><?= $row['kode_filum'] ?></th>
                                    <td><?= $row['nama_filum'] ?></td>
                                    <td><?= $row['ket_filum'] ?></td>
                                    <td><?= $row['nama_kingdom'] ?></td>
                                <?php } elseif ($tabel == 'kelas_bio') { ?>
                                    <th scope="row"><?= $row['kode_kelas'] ?></th>
                                    <td><?= $row['nama_kelas'] ?></td>
                                    <td><?= $row['ket_kelas'] ?></td>
                                    <td><?= $row['nama_kingdom'] . '>' . $row['nama_filum'] ?></td>
                                <?php } elseif ($tabel == 'ordo_bio') { ?>
                                    <th scope="row"><?= $row['kode_ordo'] ?></th>
                                    <td><?= $row['nama_ordo'] ?></td>
                                    <td><?= $row['ket_ordo'] ?></td>
                                    <td><?= $row['nama_kingdom'] . '>' . $row['nama_filum'] . '>' . $row['nama_kelas'] ?></td>
                                <?php } elseif ($tabel == 'famili_bio') { ?>
                                    <th scope="row"><?= $row['kode_famili'] ?></th>
                                    <td><?= $row['nama_famili'] ?></td>
                                    <td><?= $row['ket_famili'] ?></td>
                                    <td><?= $row['nama_kingdom'] . '>' . $row['nama_filum'] . '>' . $row['nama_kelas'] . '>' . $row['nama_ordo'] ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <h1>Pilih dulu taksonnya.</h1>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>