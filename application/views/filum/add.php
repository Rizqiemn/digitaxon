<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Barang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('filum') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="kode_kingdom">Kingdom</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="kode_kingdom" id="kode_kingdom" class="custom-select cari_kingdom">
                                <option value="" selected disabled>Pilih Kingdom</option>
                                <?php foreach ($kingdom as $kd) : ?>
                                    <option <?= set_select('kode_kingdom', $kd['kode_kingdom']) ?> value="<?= $kd['kode_kingdom'] ?>"><?= $kd['nama_kingdom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('kingdom/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('kode_kingdom', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_filum">Kode Filum</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('kode_filum', $kode_filum); ?>" name="kode_filum" id="kode_filum" type="text" class="form-control" placeholder="ID Barang...">
                        <?= form_error('kode_filum', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_filum">Nama Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_filum'); ?>" name="nama_filum" id="nama_filum" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_filum', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ket_filum">Keterangan Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('ket_filum'); ?>" name="ket_filum" id="ket_filum" type="text" class="form-control" placeholder="Keterangan Barang...">
                        <?= form_error('ket_filum', '<small class="text-danger">', '</small>'); ?>
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