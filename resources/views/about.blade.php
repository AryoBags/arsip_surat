@include('layout.head')
<body>
    <div class="dashboard">
        @include('layout.sidebar')
      <main class="content">
        @include('layout.header')

            <section class="main-content-create">
                <h2>About</h2>
                <div class="about">
                    <div>
                        <img class="pp" src="gambar/download.jpeg" alt="gambar">
                    </div>
                    <div>
                        <ul class="about-des">
                            <li><a href="#">aplikasi ini dibuat oleh : </a></li>
                            <li><a href="#">Nama</a></li>
                            <li><a href="#">prodi</a></li>
                            <li><a href="#">NIM</a></li>
                            <li><a href="#">Tanggal</a></li>
                          </ul>
                    </div>

                </div>

            </section>
        </main>
    </div>

</body>
<footer class="footer">
    <p>&copy; 2023 climtain</p>
    </footer>
</html>
