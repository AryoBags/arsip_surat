<aside class="sidebar" style="padding: 10px;">
    <div class="menu" style="margin-bottom: 20px;">
      {{-- <img src="img/logo2.png" alt="Logo" /> --}}
      <li style="list-style-type: none;"><a href="#">Menu</a></li>
    </div>
    <ul class="nav" style="display:block; padding: 0; list-style-type: none;">
      <li style="display: flex; align-items: center; margin-bottom: 30px;">
        <i class="gg-mail" style="margin-right: 10px;"></i>
        <a href="{{ route('Surat.index') }}" style="text-decoration: none;">Arsip</a>
      </li>
      <li style="display: flex; align-items: center; margin-bottom: 30px;">
        <i class="gg-album" style="margin-right: 10px;"></i>
        <a href="{{ route('kategoriSurat.index') }}" style="text-decoration: none;">Kategori</a>
      </li>
      <li style="display: flex; align-items: center; margin-bottom: 30px;">
        <i class="gg-info" style="margin-right: 10px;"></i>
        <a href="{{ route('About.index') }}" style="text-decoration: none;">About</a>
      </li>
    </ul>
</aside>

