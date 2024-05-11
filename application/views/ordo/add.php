<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah ordo
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('ordo') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="kode_kelas">kelas</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="kode_kelas" id="kode_kelas" class="custom-select cari_kelas">
                                <option value="" selected disabled>Pilih kelas (Kingdom>Filum>Kelas)</option>
                                <?php foreach ($kelas as $kd) : ?>
                                    <option <?= set_select('kode_kelas', $kd['kode_kelas']) ?> value="<?= $kd['kode_kelas'] ?>"><?= $kd['nama_kingdom'] . '>' . $kd['nama_filum'] . '>' . $kd['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('kelas/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('kode_kelas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_ordo">Kode ordo</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('kode_ordo', $kode_ordo); ?>" name="kode_ordo" id="kode_ordo" type="text" class="form-control" placeholder="ID ordo...">
                        <?= form_error('kode_ordo', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_ordo">Nama ordo</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_ordo'); ?>" name="nama_ordo" id="nama_ordo" type="text" class="form-control" placeholder="Nama ordo...">
                        <?= form_error('nama_ordo', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ket_ordo">Keterangan ordo</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('ket_ordo'); ?>" name="ket_ordo" id="ket_ordo" type="text" class="form-control" placeholder="Keterangan ordo...">
                        <?= form_error('ket_ordo', '<small class="text-danger">', '</small>'); ?>
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