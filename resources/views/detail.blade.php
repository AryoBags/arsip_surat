@include('layout.head')
<body>
    <div class="dashboard">
        @include('layout.sidebar')
      <main class="content">
        @include('layout.header')

            <section class="main-content-create">
                <h2>Detail Surat</h2>
                <div>
                    <ul class="detail-surat" >
                        <li><a href="#">Nomor   :</a> {{ $surat->nomor_surat }}</li>
                        <li><a href="#">Kategori:</a> {{ $surat->kategoriSurat->nama_kategori }}</li>
                        <li><a href="#">Judul   :</a> {{ $surat->judul }} </li>
                        @if ($surat->created_at == $surat->updated_at)
                        <li><a href="#">Waktu Unggah :</a> {{ $surat->created_at}}</li>
                        @else
                        <li><a href="#">Waktu Unggah :</a> {{ $surat->updated_at}}</li>
                        @endif
                      </ul>
                </div>
                <div>
                    <embed src="{{ asset('storage/' . $surat->file) }}" type="application/pdf" width="100%" height="500px" />
                </div>
                <div class="button-container" style="margin-top: 30px">
                    <a href="{{ route('Surat.index') }}" class="back-button"><< Kembali</a>
                    <a href="{{ asset('storage/' . $surat->file) }}" class="btn" style="color: #fbf6ee; background-color:#FFB534;     font-weight: bold;
                        font-size: 14px;
                        margin-right: 5px; padding: 10px 20px;" download>Unduh</a>

                    <a href="{{ route('Surat.edit', $surat->id) }}" style="color: #fbf6ee; " class="edit-button">Edit/Ganti File</a>


                </div>

            </section>
        </main>
    </div>

</body>
>
</html>
