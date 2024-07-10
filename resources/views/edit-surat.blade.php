@include('layout.head')
<body>
    <div class="dashboard">
        @include('layout.sidebar')
        <main class="content">
            @include('layout.header')

            <section class="main-content-create">
                <h2>Edit Arsip Surat</h2>
                <form action="{{ route('Surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="data-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nomor_surat">Nomor Surat</label>
                        <input type="text" id="nomor_surat" name="nomor_surat" placeholder="Enter Nomor" value="{{ $surat->nomor_surat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori_surat_id">Kategori</label>
                        <select id="kategori_surat_id" name="kategori_surat_id" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ $surat->kategori_surat_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" id="judul" name="judul" placeholder="Enter Judul" value="{{ $surat->judul }}" required>
                    </div>
                    <div class="form-group">
                        <label for="file">File Surat</label>
                        <input type="file" id="file" name="file" accept=".pdf">
                        @if($surat->file)
                            <p>Current file: <a href="{{ asset('storage/' . $surat->file) }}" target="_blank">{{ $surat->file }}</a></p>
                        @endif
                    </div>
                    <div class="button-container">
                        <button type="submit" class="save-button">Submit</button>
                        <a href="{{ route('Surat.show', $surat->id) }}" class="back-button">Kembali</a>
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
