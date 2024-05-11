<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit kelas
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
                    <label class="col-md-3 text-md-right" for="kode_filum">filum</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="kode_filum" id="kode_filum" class="custom-select cari_filum">
                                <option value="" selected disabled>Pilih filum</option>
                                <?php foreach ($filum as $kd) : ?>
                                    <option <?= set_select('kode_filum', $kd['kode_filum']) ?> value="<?= $kd['kode_filum'] ?>"><?= $kd['nama_filum'] ?></option>
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
                    <label class="col-md-3 text-md-right" for="nama_kelas">Nama kelas</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_kelas', $kelas['nama_kelas']); ?>" name="nama_kelas" id="nama_kelas" type="text" class="form-control" placeholder="Nama kelas...">
                        <?= form_error('nama_kelas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ket_kelas">Keterangan kelas</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('ket_kelas', $kelas['ket_kelas']); ?>" name="ket_kelas" id="ket_kelas" type="text" class="form-control" placeholder="Keterangan kelas...">
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