@include('layout.head')
<body>
    <div class="dashboard">
        @include('layout.sidebar')
        <main class="content">
            @include('layout.header')

            <section class="main-content-create">
                <h2>Unggah Arsip Surat</h2>
                <form action="{{ route('Surat.store') }}" method="POST" enctype="multipart/form-data" class="data-form" onsubmit="return validateFile()">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nomor Surat</label>
                        <input type="text" id="name" name="nomor_surat" placeholder="Enter Nomor" required>
                    </div>
                    <div class="form-group">
                        <label for="kesulitan">Kategori</label>
                        <select id="kesulitan" name="kategori_surat_id" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="daerah">Judul</label>
                        <input type="text" id="daerah" name="judul" placeholder="Enter Judul" required>
                    </div>
                    <div class="form-group">
                        <label for="file">File Surat</label>
                        <small style="display: block; margin-bottom: 5px; color:gray;">File Berupa Format PDF MAX 5 MB</small>
                        <input type="file" id="file" name="file" accept=".pdf" required>
                    </div>
                    <!-- Tambahan elemen-elemen form sesuai kebutuhan Anda -->
                    <div class="button-container">
                        <button type="submit" class="save-button">Submit</button>
                        <a href="{{ route('Surat.index') }}" class="back-button">Back</a>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <script>
        function validateFile() {
            const fileInput = document.getElementById('file');
            const file = fileInput.files[0];
            const maxSize = 5 * 1024 * 1024; // 5 MB in bytes

            if (file && file.size > maxSize) {
                alert('File terlalu besar. Maksimal ukuran file adalah 5 MB.');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
