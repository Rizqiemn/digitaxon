<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Barang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('kingdom') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="nama_kingdom">Nama Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_kingdom', $kingdom['nama_kingdom']); ?>" name="nama_kingdom" id="nama_kingdom" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_kingdom', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ket_kingdom">Keterangan Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('ket_kingdom', $kingdom['ket_kingdom']); ?>" name="ket_kingdom" id="ket_kingdom" type="text" class="form-control" placeholder="Keterangan Barang...">
                        <?= form_error('ket_kingdom', '<small class="text-danger">', '</small>'); ?>
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