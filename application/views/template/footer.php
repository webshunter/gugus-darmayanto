<!-- ======= Footer ======= -->



<footer id="footer">
    <div class="footer-top ">
        <div class="container ">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3><?= cek(Perusahaans::get(),'nama_perusahaan'); ?></h3>
                    <p>
                        <strong>Alamat:</strong> <?= cek(Perusahaans::get(),'alamat'); ?><br>
                        <strong>Phone:</strong> <?= cek(Perusahaans::get(),'hp'); ?><br>
                        <strong>Email:</strong> <?= cek(Perusahaans::get(),'email'); ?><br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Menu</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Portofolio</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Aktifitas</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Sosial Media</h4>
                    <p>Kunjungi sosial media kami.</p>
                    <div class="social-links mt-3">
                        <?php foreach($this->db->query("SELECT * FROM sosmed")->result() as $kk => $dd) : ?>
                            <a href="<?= $dd->link; ?>" class="<?= $dd->judul; ?>"><i class="bx bxl-<?= $dd->icon; ?>"></i></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            <?= cek(Perusahaans::get(),'copyright'); ?>
        </div>
        <div class="credits">
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/front/') ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/front/') ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/front/') ?>assets/js/main.js"></script>

</body>

</html>
