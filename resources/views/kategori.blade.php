@include('layout.head')
<body>
    <div class="dashboard">
        @include('layout.sidebar')
      <main class="content">
        @include('layout.header')
        <section class="main-content">
          <h2>Arsip Surat</h2>
          <div class="button-container">
            <a  href="{{route('kategoriSurat.create')}}"class="add-button">Add New</a>
          </div>
          <div class="search-filter">
            <form action="{{ route('kategoriSurat.index') }}" method="GET" class="d-flex w-100">
                <span class="input-group-text">Cari Surat</span>
                <input type="text" name="search" class="form-control rounded-start"
                    placeholder="Search..." aria-label="Search" aria-describedby="search-button"
                    value="{{ request('search') }}">
                <button class="btn btn-primary rounded-end" type="submit" id="search-button">Cari</button>
            </form>
          </div>
          <table class="data-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th style="text-align: center">Actions</th>
                <!-- Menambahkan kolom "Actions" -->
              </tr>
            </thead>
            <tbody>
              @foreach ($kategoriSurat as $kategoriSurat)
              <tr>
                <td>{{$kategoriSurat->id}}</td>
                <td>{{$kategoriSurat->nama_kategori}}</td>
                <td>{{$kategoriSurat->keterangan}}</td>
                <td style="text-align: center">
                    <a href="{{route('kategoriSurat.edit',$kategoriSurat->id)}}" class="edit-button">Edit</a>
                    <button class="delete-button" data-toggle="modal" data-target="#deleteModal"
                    data-id ="{{$kategoriSurat->id}}">Delete</button>
                  </td>
                  @endforeach
            </tbody>
          </table>
          <div class="pagination">
            <!-- <button id="prevButton"></button> -->
            <div id="pageNumbers" class="page-numbers">
              <!-- Angka halaman akan ditambahkan melalui JavaScript -->
            </div>
            <!-- <button id="nextButton"></button> -->
          </div>
        </section>
      </main>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Kategori Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda ingin hapus kategori surat ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var action = '{{ route('kategoriSurat.destroy', ':id') }}';
            action = action.replace(':id', id);
            $('#deleteForm').attr('action', action);
        });

        $('#deleteForm').on('submit', function(event) {
            event.preventDefault();
            var form = $(this);
            var action = form.attr('action');

            $.ajax({
                url: action,
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#deleteModal').modal('hide');
                        location.reload(); // Reload the page to reflect the changes
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    alert('An error occurred while deleting the Kategori Surat.');
                }
            });
        });
    </script>
    <!-- <footer class="footer">
        <p>&copy; 2023 climtain</p>
    </footer> -->
  </body>
  <script src="admin.js"></script>
</html>
