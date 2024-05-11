<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah famili
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('famili') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="kode_ordo">ordo</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="kode_ordo" id="kode_ordo" class="custom-select cari_ordo">
                                <option value="" selected disabled>Pilih ordo (Kingdom>Filum>Kelas>Ordo)</option>
                                <?php foreach ($ordo as $kd) : ?>
                                    <option <?= set_select('kode_ordo', $kd['kode_ordo']) ?> value="<?= $kd['kode_ordo'] ?>"><?= $kd['nama_kingdom'] . '>' . $kd['nama_filum']. '>' . $kd['nama_kelas'] . '>' . $kd['nama_ordo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('ordo/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('kode_ordo', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_famili">Kode famili</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('kode_famili', $kode_famili); ?>" name="kode_famili" id="kode_famili" type="text" class="form-control" placeholder="ID famili...">
                        <?= form_error('kode_famili', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_famili">Nama famili</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_famili'); ?>" name="nama_famili" id="nama_famili" type="text" class="form-control" placeholder="Nama famili...">
                        <?= form_error('nama_famili', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ket_famili">Keterangan famili</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('ket_famili'); ?>" name="ket_famili" id="ket_famili" type="text" class="form-control" placeholder="Keterangan famili...">
                        <?= form_error('ket_famili', '<small class="text-danger">', '</small>'); ?>
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