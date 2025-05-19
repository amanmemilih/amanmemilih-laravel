@extends('layouts.admin')

@section('css')
<style>
  .blog-thumbnail {
    width: 100px;
    height: 60px;
    object-fit: cover;
  }
  .table-responsive {
    overflow-x: auto;
  }
</style>
@endsection

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-5">
    <h2>Berita</h2>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Tambah Berita</a>
  </div>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th style="width: 50px">No</th>
          <th style="width: 120px">Thumbnail</th>
          <th>Title</th>
          <th style="width: 150px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($blogs as $index => $blog)
          <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td class="text-center">
              <img src="{{ asset('storage/blogs/' . $blog->thumbnail) }}" 
                   class="blog-thumbnail" 
                   alt="{{ $blog->title }}">
            </td>
            <td>{{ $blog->title }}</td>
            <td>
              <div class="btn-group" role="group">
                <a href="{{ route('blogs.edit', $blog->id) }}" 
                   class="btn btn-warning btn-sm text-light">
                  Edit
                </a>
                <button type="button" 
                        class="btn btn-danger btn-sm" 
                        onclick="handleDelete('{{ $blog->id }}')" 
                        data-bs-toggle="modal" 
                        data-bs-target="#delete-modal">
                  Delete
                </button>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center">Tidak ada data berita</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Delete Modal -->
  <form method="POST" id="delete-form">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Apakah anda yakin ingin menghapusnya?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Data yang sudah terhapus tidak bisa dikembalikan lagi!</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
            <button class="btn btn-danger" type="submit">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

@section('script')
<script>
  function handleDelete(id) {
    const form = document.getElementById('delete-form');
    form.action = `{{ url('/blogs') }}/${id}`;
  }
</script>
@endsection