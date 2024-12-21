@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/owlcarousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/rating.css') }}">
@endsection

@section('js')
  <script src="{{ url('/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('/js/rating/jquery.barrating.js') }}"></script>
  <script src="{{ url('/js/rating/rating-script.js') }}"></script>
  <script src="{{ url('/js/owlcarousel/owl.carousel.js') }}"></script>
  <script src="{{ url('/js/ecommerce.js') }}"></script>
  <script src="{{ url('/js/product-list-custom.js') }}"></script>

  <script>
    const url = 'blogs';

    function handleDelete(id) {
      $('#delete-form').attr('action', `{{ url('${url}/${id}') }}`);
    }
  </script>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="page-title">
      <div class="d-flex justify-content-between">
        <div class="">
          <h3>Blog list</h3>
        </div>
        <div class="">
          <a class="btn btn-primary" href="{{ route('blogs.create') }}">Add Blog</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid list-products">
    <div class="row">
      <!-- Individual column searching (text inputs) Starts-->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Blog </h5>
            <span>Welcome to the Blog List Page. Here, as an administrator, you have full control to manage the available blogs. You can easily perform various actions such as editing, deleting, or adding new products as per your requirements. Please use the provided menu and tools to efficiently manage your product catalog.</span>
          </div>
          <div class="card-body">
            <div class="table-responsive product-table">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($blogs as $row)
                    <tr>
                      <td><a href="product-page.html"><img class="rounded" src="{{ $row->thumbnail_content }}" alt=""></a></td>
                      <td><h6> {{ $row->title }}</h6></td>
                      <td>{{ $row->author }}</td>
                      <td>{{ date("d F Y", strtotime($row->created_at)) }}</td>
                      <td>
                        <button class="btn btn-primary btn-xs" onclick="window.location.href=`{{ route('blogs.edit', $row->id) }}`" data-original-title="btn btn-danger btn-xs" title="">Edit</button>
                        <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="handleDelete({{ $row->id }})" data-bs-toggle="modal" data-bs-target="#delete-modal">Delete</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Individual column searching (text inputs) Ends-->
  <!-- Container-fluid Ends-->

  <!-- Delete Modal -->
  <form method="POST" id="delete-form">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure you want to delete?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Deleted data cannot be recovered!</div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection