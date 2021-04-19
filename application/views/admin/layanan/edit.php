<br>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
          <h1 class="m-0 text-dark">Ubah Layanan</h1>
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

          <form action="<?= site_url('admin/layanan/update') ?>" method="post" enctype="multipart/form-data">
              
        <?=
            form::input([
                "type" => "hidden",
                "fc" => "id",
                "value" => $form_data->id,
            ])
        ?>
    
                <?=
                    form::input([
                        "title" => "icon",
                        "type" => "file",
                        "fc" => "icon",
                        "placeholder" => "tambahkan icon",
                        "value" => $form_data->icon,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "judul",
                        "type" => "text",
                        "fc" => "title",
                        "placeholder" => "tambahkan title",
                        "value" => $form_data->title,
                    ])
                ?>
            
                <?=
                    form::input([
                        "title" => "deskripsi",
                        "type" => "text",
                        "fc" => "des",
                        "placeholder" => "tambahkan des",
                        "value" => $form_data->des,
                    ])
                ?>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url('admin/layanan'); ?>">Back</a>
              </div>
          </form>

				</div>
			</div>
		</div>
	</div>
</div>
</section>