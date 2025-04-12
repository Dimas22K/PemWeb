<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Area Cakupan | Sampah Berkah</title>
  <link rel="stylesheet" href="Lokasi.css">
</head>
<body>
    <!--Header-->
  <header>
    <div class="navbar">
      <a href="index.php" class="logo">Sampah <span>Berkah</span></a>
      <nav>
        <ul>
          <li><a href="TentangKami.html">Tentang Kami</a></li>
          <li><a href="layanan.html">Layanan</a></li>
          <li><a href="panduan.html">Panduan</a></li>
          <li><a href="lokasi.html">Lokasi</a></li>
          <li><a href="kontak.html">Kontak Kami</a></li>
        </ul>
      </nav>
      <a href="#" class="btn-masuk">Masuk</a>
    </div>
  </header>

<section class="area-cakupan">
  <h2>AREA CAKUPAN</h2>
  <div class="line"></div>
  <p class="desc">Personal Waste Management telah tersedia di</p>

  <div class="statistik">
    <div class="box">
      <h3 class="counter" data-count="4">1</h3>
      <p>Kota/Kabupaten<br>Surabaya</p>
    </div>
    <div class="box">
      <h3 class="counter" data-count="19">0</h3>
      <p>Kecamatan</p>
    </div>
    <div class="box">
      <h3 class="counter" data-count="93">0</h3>
      <p>Kelurahan</p>
    </div>
  </div>

  <div class="map-container">
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.9625930909557!2d112.6290947!3d-7.2199298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ff4f94c6558b%3A0x4da58ba34e1c58c8!2sTPA%20Benowo!5e0!3m2!1sid!2sid!4v1712931845263!5m2!1sid!2sid"
    width="100%" 
    height="500" 
    style="border:0;" 
    allowfullscreen="" 
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>

  <div class="cta">
    <p>Ingin mengetahui cakupan layanan di lokasi Anda?</p>
    <button onclick="window.location.href='#'">TANYAKAN SEKARANG</button>
  </div>
</section>

<script src="script.js"></script>

<!-- Footer -->
<footer>
    <div class="footer-grid">
      <div>
        <p><strong>SampahBerkah</strong></p>
        <p><a href="TentangKami.html">Tentang Kami</a></p>
        <p><a href="layanan.html">Layanan</a></p>
        <p><a href="#">Mitra</a></p>
      </div>
      <div>
        <p><strong>Informasi</strong></p>
        <p><a href="kontak.html">Kontak Kami</a></p>
        <p><a href="#">Bantuan</a></p>
        <p><a href="#">Syarat & Ketentuan</a></p>
        <p><a href="#">Kebijakan Privasi</a></p>
      </div>
    </div>
    <div class="footer-img">
      <img src="gambar/border.png" alt="Recycle">
    </div>
  </footer>

</body>
</html>
