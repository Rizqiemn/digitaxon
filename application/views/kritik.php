<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Kritik dan Saran
                        </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', []); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id">ID</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('id', $id); ?>" name="id" id="id" type="text" class="form-control" placeholder="ID...">
                        <?= form_error('id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_pengirim">Nama</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_pengirim'); ?>" name="nama_pengirim" id="nama_pengirim" type="text" class="form-control" placeholder="Nama...">
                        <?= form_error('nama_pengirim', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="email_pengirim">Email</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('email_pengirim'); ?>" name="email_pengirim" id="email_pengirim" type="text" class="form-control" placeholder="Email...">
                        <?= form_error('email_pengirim', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="judul_kritik">Subyek</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('judul_kritik'); ?>" name="judul_kritik" id="judul_kritik" type="text" class="form-control" placeholder="Subyek...">
                        <?= form_error('judul_kritik', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="isi_kritik">Isi</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('isi_kritik'); ?>" name="isi_kritik" id="isi_kritik" type="text" class="form-control" placeholder="Isi...">
                        <?= form_error('isi_kritik', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <input type="hidden" id="status" name="status" value="Pending">
                <?php $tanggal = date("Y-m-d"); ?>
                <input type="hidden" id="tanggal_kritik" name="tanggal_kritik" value="<?= $tanggal ?>">
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