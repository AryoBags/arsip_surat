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
                        <input type="text" id="name" name="nama_kategori" placeholder="Nama Kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="daerah">Judul</label>
                        <input type="text" id="daerah" name="keterangan" placeholder="Judul" required>
                    </div>
                    <!-- Tambahan elemen-elemen form sesuai kebutuhan Anda -->
                    <div class="button-container">
                        <a href="{{route('kategoriSurat.index')}}" class="edit-button" style="background-color: #65B741; color:#fbf6ee; "> << Kembali</a>
                        <button type="submit" class="save-button" style="color:#fbf6ee;">Simpan</button>


                    </div>
                </form>
            </section>
        </main>
    </div>

</body>

</html>
