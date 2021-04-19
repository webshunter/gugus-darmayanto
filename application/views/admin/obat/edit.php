<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah obat</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">

          <form action="<?= site_url('admin/obat/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "foto obat",
                        "type" => "file",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                        "value" => $form_data->foto,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama obat",
                        "type" => "text",
                        "fc" => "obat",
                        "placeholder" => "tambahkan obat",
                        "value" => $form_data->obat,
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "tipe obat",
                        "type" => "password",
                        "fc" => "tipe_obat_id",
                        "placeholder" => "tambahkan tipe_obat_id",
                        "db" => "tipe_obat",
                        "data" => "id",
                        "name" => "tipe_obat",
                        "selected" => $form_data->tipe_obat_id,
                    ])
                ?>
            
                <?=
                    form::editor([
                        "title" => "deskripsi",
                        "type" => "text",
                        "fc" => "deskripsi",
                        "placeholder" => "tambahkan deskripsi",
                        "value" => $form_data->deskripsi,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/obat'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>