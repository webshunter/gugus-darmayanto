<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Penyakit</h1>
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

          <form action="<?= site_url('admin/penyakit/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "foto",
                        "type" => "file",
                        "fc" => "foto",
                        "placeholder" => "tambahkan foto",
                        "value" => $form_data->foto,
                    ])
                ?>
            
                <?=
                    form::select_db([
                        "title" => "jenis penyakit",
                        "type" => "password",
                        "fc" => "jenis_penyakit_id",
                        "placeholder" => "tambahkan jenis_penyakit_id",
                        "db" => "jenis_penyakit",
                        "data" => "id",
                        "name" => "jenis_penyakit",
                        "selected" => $form_data->jenis_penyakit_id,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "nama penyakit",
                        "type" => "text",
                        "fc" => "nama_penyakit",
                        "placeholder" => "tambahkan nama_penyakit",
                        "value" => $form_data->nama_penyakit,
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
                <a class="btn btn-default" href="<?= site_url('admin/penyakit'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>