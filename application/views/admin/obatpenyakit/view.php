<?php

$id = generate_session('penyakitid');

$cc = $this->db->query("SELECT * FROM penyakit WHERE id = '$id'")->row();

?>
<br>
<div class="notika-email-post-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                  <a href="<?= site_url('admin/penyakit'); ?>" class="btn btn-default" onclick="window.history.back()"><i class="fas fa-undo-alt"></i> kembali</a>
                  <br>
                  <br>
                    <h1 class="m-0 text-dark"><?= $cc->nama_penyakit ?></h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <br>
<div class="notika-email-post-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="email-statis-inner notika-shadow">
                  <?php
                    link_button([
                      "link" => "admin/obatpenyakit/simpan",
                      "class" => "btn btn-success",
                      "text" => "Tambahkan Obat",
                    ]);
                  ?>
                  <hr>
                      <?= $datatable ?>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">wait ...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" id="detail">
        </div>
      </div>
      <div class="modal-footer text-center" id="pagination">
      </div>
    </div>
  </div>
</div>

<script>

  var id = null;

	// artikel area
	var artikel = {
		draw: 1,
		start: 0,
		length: 8
	}

	var site_url = '<?= site_url('') ?>';

	var artikelUrl = '<?= site_url('')?>admin/obat/table_show2/show';

	// get text only
	globalThis.gabi_content = function(content) {
		var c = document.createElement('div');
		c.innerHTML = content;
		return c.textContent;
	}

	globalThis.pagination = function(aq){

		if (aq == undefined) {
			aq = 0;
		}

		var c = globalThis.data;
		var d = c.recordsFiltered;
		var e = artikel.length;
		var f = Math.ceil(d / e);
		var dc = 10;
		var op = 10;

		console.log(aq);

		if (f <= (aq + op)) {
			op = f - aq;
		}


		var g = div();
		g.id('pagination').css({margin: "0 20px"})

		var u = ul().class('pagination').css({display: "inline-block"})

		u.child(
			li().class('page-item').child(
				el('a').class('page-link').text('Previous')
				.click(function(){
					if ((aq - op) < 0) {
						alert('you in first page');
					}else{
						globalThis.pagination(Number(aq) - op);
					}
				})
			)
		)

		if (f < op) {
			op = f
		}

		for (let w = 0 + aq; w < op + aq; w++) {
			u.child(
				li().class('page-item').child(
					el('a').data('a', w).class('page-link').href('#top-artikel').text(w+1)
					.click(function(){
						var l = this.getAttribute('data-a');
						artikel.start = Number(l) * 5;
						globalThis.view();
					})
				)
			)
		}

		u.child(
			li().class('page-item').child(
				el('a').class('page-link').text('Next')
				.click(function(){
					if (f <= (aq + dc)) {
						alert('you on the last page')
					}else{
						globalThis.pagination(Number(aq) + op);
					}
				})
			)
		)

		var s = el('nav')
		.attr('aria-label', 'Page navigation example')
		.child(u)

		g.child(
			s
		)

		domp('pagination', g);

	}


	globalThis.view = function(func = ''){
		axios.post(artikelUrl, artikel).then(function(res){

			var data = res.data;

			if (globalThis.data == undefined) {
				globalThis.data = data;
				globalThis.pagination();
			}


			var em = data.data.map(function(el, e){

				return `
					<div class="col-xs-6 col-sm-3">
            <div class="panel" onclick="globalThis.saveobat(${el[7]})" style="box-shadow: 0 0 20px rgba(123,123,123,0.5); cursor: pointer;">
              <div class="panel-body">
                <center>
                  ${el[1]}
                  <p style="margin-top:10px;"><b>${el[2]}</b></p>
                </center>
              </div>
            </div>
					</div>
				`;

			}).join('')
			document.getElementById('detail').innerHTML = em;

      setTimeout(function() {
        if(func != ''){
          func();
        }
      }, 100);

		})
	}

  globalThis.aturan = function(func = ''){
    document.getElementById('detail').innerHTML = ``;
    setTimeout(function() {
      if(func != ''){
        func();
      }
    }, 100);
  }

  globalThis.obatTerpilih = function(a){
  }

  globalThis.aturanObat = function(a){
  }

  globalThis.saveobat = function(idobat){
    axios.post(site_url+'admin/obatpenyakit/saveobat', {id: id, idobat: idobat}).then(function(els){
      globalThis.tableku.ajax.reload()
      $('.modal').modal('toggle');
    })
  }

</script>
