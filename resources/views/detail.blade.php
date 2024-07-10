@include('layout.head')
<body>
    <div class="dashboard">
        @include('layout.sidebar')
      <main class="content">
        @include('layout.header')

            <section class="main-content-create">
                <h2>Detail Surat Surat</h2>
                <div>
                    <ul class="detail-surat">
                        <li><a href="#">Nomor</a> {{ $surat->nomor_surat }}</li>
                        <li><a href="#">Kategori</a> {{ $surat->kategori_surat->nama_kategori }}</li>
                        <li><a href="#">Judul</a> {{ $surat->judul }} </li>
                        @if ($surat->created_at == $surat->updated_at)
                        <li><a href="#">Waktu Unggah</a> {{ $surat->created_at}}</li>
                        @else
                        <li><a href="#">Waktu Unggah</a> {{ $surat->updated_at}}</li>
                        @endif
                      </ul>
                </div>
                <div>
                    <embed src="{{ asset('storage/' . $surat->file) }}" type="application/pdf" width="100%" height="500px" />
                </div>
                <div class="button-container">
                    <a href="{{ route('Surat.index') }}" class="back-button">Kembali</a>
                    <a href="{{ asset('storage/' . $surat->file) }}" class="btn btn-secondary" download>Unduh</a>
                    <a href="{{ route('Surat.edit', $surat->id) }}" class="edit-button">Edit</a>


                </div>

            </section>
        </main>
    </div>

</body>
<footer class="footer">
    <p>&copy; 2023 climtain</p>
    </footer>
</html>
