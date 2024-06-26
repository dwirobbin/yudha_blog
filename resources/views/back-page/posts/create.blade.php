@extends('layouts.back-core.main')

@push('styles')
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('assets/back-src/plugins/select2/css/select2.min.css') }}">
@endpush

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs ml-0 border-left-0">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Master Data</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{ $title }}</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Create</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah {{ $title }} Baru</h4>
                            <a href="{{ url('master-data/posts') }}" class="btn btn-warning btn-round ml-auto">
                                <i class="fa fa-arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <form action="{{ url('master-data/posts/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">
                                            Judul<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                            placeholder="Judul..." value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 py-3">
                                    <img src="https://dummyimage.com/1098x538/dee2e6/6c757d.jpg" class="img-fluid" width="100%"
                                        style="max-height: 200px" id="preview-image">
                                </div>
                                <div class="col-md-7 py-3">
                                    <div class="form-group">
                                        <label for="categoryId">
                                            Kategori<span class="text-danger">*</span>
                                        </label>
                                        <select id="categoryId" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                @if (old('category_id') == $category->id)
                                                    <option value="{{ $category->id }}" selected>
                                                        {{ $category->category_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group pt-4">
                                        <label for="imgCover">Sampul</label>
                                        <div class="custom-file">
                                            <input type="file" id="imgCover" name="img_cover"
                                                class="custom-file-input @error('img_cover') is-invalid @enderror" />
                                            <label class="custom-file-label" for="imgCover">Pilih Gambar</label>
                                            @error('img_cover')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tagIds">
                                            Tags<span class="text-danger">*</span>
                                        </label>
                                        <select id="tagIds" name="tag_ids[]" class="form-control @error('tag_ids') is-invalid @enderror"
                                            multiple="multiple">
                                            @foreach ($tags as $tag)
                                                @if (old('tag_ids') == $tag->id)
                                                    <option value="{{ $tag->id }}" selected>
                                                        {{ $tag->tag_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('tag_ids')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group pb-0">
                                        <label for="text-area">
                                            Deskripsi<span class="text-danger">*</span>
                                        </label>
                                        <textarea name="description" id="text-area" class="form-control @error('description') is-invalid @enderror">
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-save mr-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Summernote -->
    <script src="{{ asset('assets/back-src/plugins/summernote-bs4/summernote-bs4.min.js') }}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('assets/back-src/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <!-- select2 -->
    <script src="{{ asset('assets/back-src/plugins/select2/js/select2.min.js') }}"></script>

    <!-- tinymce5 -->
    <script src="{{ asset('assets/back-src/plugins/tinymce5/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/back-src/plugins/tinymce5/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#imgCover').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr({
                        src: e.target.result
                    }).height(200);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#tagIds').select2({
                placeholder: "Pilih Tags",
                width: "100%"
            })

            bsCustomFileInput.init();

            $("#text-area").tinymce({
                relative_urls: false,
                language: "en",
                min_height: 500,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern imagetools",
                ],
                extended_valid_elements: 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
                toolbar: "insertfile undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | preview fullscreen",
                imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',
                file_picker_callback: function(callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth ||
                        document.getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight || document.documentElement.clientHeight ||
                        document.getElementsByTagName('body')[0].clientHeight;

                    let cmsURL = "{{ url('laravel-filemanager') }}" + '?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            });
        })
    </script>
@endpush
