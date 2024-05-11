<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Kelas
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('kelas') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', []); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_filum">Filum</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="kode_filum" id="kode_filum" class="custom-select cari_filum">
                                <option value="" selected disabled>Pilih Filum (Kingdom>Filum)</option>
                                <?php foreach ($filum as $kd) : ?>
                                    <option <?= set_select('kode_filum', $kd['kode_filum']) ?> value="<?= $kd['kode_filum'] ?>"><?= $kd['nama_kingdom'] . '>' . $kd['nama_filum'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('filum/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('kode_filum', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_kelas">Kode kelas</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('kode_kelas', $kode_kelas); ?>" name="kode_kelas" id="kode_kelas" type="text" class="form-control" placeholder="ID Kelas...">
                        <?= form_error('kode_kelas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_kelas">Nama Kelas</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_kelas'); ?>" name="nama_kelas" id="nama_kelas" type="text" class="form-control" placeholder="Nama Kelas...">
                        <?= form_error('nama_kelas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ket_kelas">Keterangan Kelas</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('ket_kelas'); ?>" name="ket_kelas" id="ket_kelas" type="text" class="form-control" placeholder="Keterangan Kelas...">
                        <?= form_error('ket_kelas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>