@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('.dropify').dropify();
    new FroalaEditor('textarea', {
      heightMin: 500,
      imageUpload: false,
      pasteImage: false,
      toolbarButtons: ['undo', 'redo' , '|', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'outdent', 'indent', 'clearFormatting', 'insertTable', 'html'],
    });
  </script> 
@endsection

@section('content')
<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3>Edit Product</h3>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="date-picker">
            <form class="theme-form" action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Thumbnail</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group  @error('thumbnail') is-invalid border-danger @enderror">
                    <input type="file" class="dropify " name="thumbnail" data-default-file="{{ $blog->thumbnail_content }}" data-show-remove="false" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="1M" value="{{ $blog->thumbnail_content }}" />
                    @error('thumbnail')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Title</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('title') is-invalid border-danger @enderror" name="title" type="text" placeholder="Enter title" value="{{ old('title', $blog->title) }}">
                    @error('title')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Author</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <input class="form-control @error('author') is-invalid border-danger @enderror" name="author" type="text" placeholder="Enter author" value="{{ old('author', $blog->author) }}">
                    @error('author')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end">Content</label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <textarea class="bg-secondary" name="body">{{ old('body', $blog->body) }}</textarea>
                  </div>
                </div>
              </div>
              <div class="mb-3 row g-3">
                <label class="col-sm-3 col-form-label text-sm-end"></label>
                <div class="col-xl-5 col-sm-9">
                  <div class="input-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
@endsection