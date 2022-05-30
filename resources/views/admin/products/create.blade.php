@extends('layouts.admin')
@section('title','Form Produk')
@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Tambah Produk
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary float-right">
                        Kembali
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select class="form-control" name="category_id" id="">
                            @foreach($categories as $id => $categoryName)
                                <option value="{{ $id }}">{{ $categoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tag</label>
                        <select class="form-control" name="tags[]" multiple id="tags">
                            @foreach($tags as $id => $tagName)
                                <option value="{{ $id }}">{{ $tagName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Qty</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="weight">Berat</label>
                        <input type="number" name="weight" value="{{ old('weight') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="details">Detail Produk</label>
                        <textarea class="form-control" name="details" id="details" cols="30" rows="5"></textarea>
                    </div> --}}
                    <div class="form-group {{ $errors->has('gallery') ? 'has-error' : '' }}">
                        <label for="gallery">Foto Produk</label>
                        <div class="needsclick dropzone" id="gallery-dropzone">

                        </div>
                        @if($errors->has('gallery'))
                            <em class="invalid-feedback">
                                {{ $errors->first('gallery') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
@endsection


@push('style-alt')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('script-alt')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
   var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: "{{ route('admin.products.storeImage') }}",
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($product) && $product->gallery)
      var files =
        {!! json_encode($product->gallery) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.original_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }
         return _results
     }
}
</script>
@endpush

