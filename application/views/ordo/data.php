<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data ordo
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('ordo/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah ordo
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
                        <th>Nama ordo</th>
                        <th>Keterangan</th>
                        <th>Asal Kingdom>Filum>Kelas</th>
                        <th>Aksi</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if ($ordo) :
                        foreach ($ordo as $k) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['nama_ordo']; ?></td>
                            <td><?= $k['ket_ordo']; ?></td>
                            <td><?= $k['nama_kingdom'] . '>' . $k['nama_filum'] . '>' . $k['nama_kelas']; ?></td>

                            <td>
                                <a href="<?= base_url('ordo/edit/') . $k['kode_ordo'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('welcome/show/') . $k['kode_ordo'] ?>" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-show"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus <?= $k['nama_ordo']; ?>?')" href="<?= base_url('ordo/delete/') . $k['kode_ordo'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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
                    <th>Nama ordo</th>
                    <th>Keterangan</th>
                    <th>Asal Kingdom>Filum>Kelas</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $no = 1;
                    if ($ordo) :
                        foreach ($ordo as $k) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['nama_ordo']; ?></td>
                            <td><?= $k['ket_ordo']; ?></td>
                            <td><?= $k['nama_kingdom'] . '>' . $k['nama_filum'] . '>' . $k['nama_kelas']; ?></td>

                            <td>
                                <a href="<?= base_url('ordo/edit/') . $k['kode_ordo'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus  <?= $k['nama_ordo']; ?>?')" href="<?= base_url('ordo/delete/') . $k['kode_ordo'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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