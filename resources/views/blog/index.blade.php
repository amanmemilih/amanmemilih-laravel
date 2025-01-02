@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/owlcarousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/rating.css') }}">
@endsection

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-5">
    <h2>Berita</h2>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Tambah Berita</a>
  </div>
  <table class="table table-bordered mt-3" id="dataTable">
      <thead>
          <tr>
              <th>No</th>
              <th>Thumbnail</th>
              <th>Title</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
  </table>

  <!-- Delete Modal -->
  <form method="POST" id="delete-form">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Apakah anda yakin ingin menghapusnya??</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Data yang sudah terhapus tidak bisa dikembalikan lagi!</div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

@section('script')
  <script>
    function handleDelete() {
      
    }

    $(document).ready( function () {
      const url = 'http://localhost:8001/api'
        $('#dataTable').DataTable({
          ajax: {
            url: url + '/blogs',
            dataSrc: '',
          },
          columns: [
            {data: 'id'},
            {
              data: 'thumbnail', 
              render: function (data, type, row, meta) {
                return `<img src="storage/blogs/${data}">`;
              }

            },
            {data: 'title'},
            {
              data: 'id', 
              render: function (data, type, row, meta) {
                  return `
                  <button class="btn btn-warning text-light btn-xs" onclick="window.location.href='/blogs/${data}/edit'" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
                  <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="handleDelete(${data}})" data-bs-toggle="modal" data-bs-target="#delete-modal">Delete</button>
                  `;
              },
            }
          ]
        });
    });
  </script>
@endsection