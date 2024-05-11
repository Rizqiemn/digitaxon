<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data kelas
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('kelas/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah kelas
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <?php
                if (is_admin()) : ?>
                    <tr>
                        <th>No. </th>
                        <th>Nama kelas</th>
                        <th>Keterangan</th>
                        <th>Asal Kingdom>Filum</th>
                        <th>Aksi</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if ($kelas) :
                        foreach ($kelas as $k) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['nama_kelas']; ?></td>
                            <td><?= $k['ket_kelas']; ?></td>
                            <td><?= $k['nama_kingdom'] . '>' . $k['nama_filum'];; ?></td>

                            <td>
                                <a href="<?= base_url('kelas/edit/') . $k['kode_kelas'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('welcome/show/') . $k['kode_kelas'] ?>" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-show"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus <?= $k['nama_kelas']; ?>?')" href="<?= base_url('kelas/delete/') . $k['kode_kelas'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            <?php else : ?>
                <tr>
                    <th>No. </th>
                    <th>Nama kelas</th>
                    <th>Keterangan</th>
                    <th>Asal Kingdom>Filum</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $no = 1;
                    if ($kelas) :
                        foreach ($kelas as $k) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['nama_kelas']; ?></td>
                            <td><?= $k['ket_kelas']; ?></td>
                            <td><?= $k['nama_kingdom'] . '>' . $k['nama_filum'];; ?></td>

                            <td>
                                <a href="<?= base_url('kelas/edit/') . $k['kode_kelas'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus  <?= $k['nama_kelas']; ?>?')" href="<?= base_url('kelas/delete/') . $k['kode_kelas'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>