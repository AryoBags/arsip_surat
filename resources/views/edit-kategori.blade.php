@include('layout.head')

<body>
    <div class="dashboard">
        @include('layout.sidebar')
      <main class="content">
        @include('layout.header')

            <section class="main-content-create">
                <h2>Edit Kategori Surat</h2>
                <form action="{{route('kategoriSurat.update', ['kategoriSurat'=> $kategoriSurat->id])}}" method="POST" class="data-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" id="name" name="nama_kategori" placeholder="Enter track name" required>
                    </div>
                    <div class="form-group">
                        <label for="daerah">Judul</label>
                        <input type="text" id="daerah" name="keterangan" placeholder="Enter daerah" required>
                    </div>
                    <!-- Tambahan elemen-elemen form sesuai kebutuhan Anda -->
                    <div class="button-container">
                        <button type="submit" class="save-button">Submit</button>
                <a href="{{route('kategoriSurat.index')}}" class="back-button">Back</a>

                    </div>
                </form>
            </section>
        </main>
    </div>

</body>
<footer class="footer">
    <p>&copy; 2023 climtain</p>
    </footer>
</html>
