</div>
<!-- ======= Footer ======= -->
  <footer id="footer"
    <?php 
      if ($footerColado) {
        echo 'class="fixed-bottom"';
      } else if($pagina == "listagem") {
        echo 'class="w-100"';
      }
    ?>
  
  >
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>MedLus</strong>. Todos os Direitos Reservados
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Início</a>
            <a href="#about" class="scrollto">Sobre nós</a>
            <a href="#">Políticas de Privacidade</a>
            <a href="#">Termos de Uso</a>
          </nav>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="<?php echo $url; ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo $url; ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo $url; ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo $url; ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo $url; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- Data table -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="<?php echo $url; ?>assets/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  


  <!-- Template Main JS File -->
  <script src="<?php echo $url; ?>assets/js/main.js"></script>

  </body>

</html>