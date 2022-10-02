@extends('layouts.admin')
@section('title', 'Admin Dashboard | '.$product->name)  
@section('_scripts')
    <!-- Theme JS files -->
    <script src="{{ _adminJs('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
    <script src="{{ _adminJs('demo_pages/uploader_bootstrap.js') }}"></script>
    <script src="{{ _adminJs('app.js') }}"></script>
    <script src="{{ _adminJs('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content', {
            language: 'az'
        });
    </script>
    @include('control.product._imgsCheck')
@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Redaktə</span></h4>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('system.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                    <a href="{{ route('system.product.index') }}" class="breadcrumb-item"> Məhsullar</a>
                    <span class="breadcrumb-item active">Redaktə</span>
                    <span class="breadcrumb-item active">{{ $product->name }}</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <form action="{{ route('system.product.update',$product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Məhsul Haqqında</legend>
                        <div class="form-group form-group-floating col-lg-12 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control form-control-outline @error('name') is-invalid @enderror" placeholder="Məhsul Adı">
                                    <label class="label-floating">Məhsul Adı</label>
                                </div>
                                @error('name')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-link"></i>
                                    </div>
                                    <input type="text" name="slug" id="slug" value="{{ $product->slug }}" class="form-control form-control-outline @error('slug') is-invalid @enderror" placeholder="Url">
                                    <label class="label-floating">Url</label>
                                </div>
                                @error('slug')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-barcode"></i>
                                    </div>
                                    <input type="text" name="barcode" id="barcode" value="{{ $product->barcode }}" class="form-control form-control-outline @error('barcode') is-invalid @enderror" placeholder="Barkod">
                                    <label class="label-floating">Barkod</label>
                                </div>
                                @error('barcode')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-copyright"></i>
                                    </div>
                                    <input type="text" name="madeby" id="madeby" value="{{ $product->madeby }}" class="form-control form-control-outline @error('madeby') is-invalid @enderror" placeholder="İstehsalçı Ölkə">
                                    <label class="label-floating">İstehsalçı Ölkə</label>
                                </div>
                                @error('madeby')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <input type="text" name="stok" id="stok" value="{{ $product->stok }}" class="form-control form-control-outline @error('stok') is-invalid @enderror" placeholder="Stok">
                                    <label class="label-floating">Stok</label>
                                </div>
                                @error('stok')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <select class="custom-select form-control-outline @error('category_id') is-invalid @enderror" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : null }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="label-floating">Kataloq Seç</label>
                                </div>
                                @error('category_id')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <select class="custom-select form-control-outline @error('instok') is-invalid @enderror" name="instok">
                                        <option disabled selected >Stok Kontrol</option>
                                        <option value="1" {{ $product->instock == 1 ? 'selected' : null}}>Stokda Var</option>
                                        <option value="0" {{ $product->instock == 0 ? 'selected' : null }}>Stokda Yoxdur</option>
                                    </select>
                                    <label class="label-floating">Stok</label>
                                </div>
                                @error('instok')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-12 ">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <textarea class="form-control form-control-outline ckeditor  @error('content') is-invalid @enderror" name="content" id="content" placeholder="Content">{{ optional($product)->content }}</textarea>
                                </div>
                                @error('content')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    @error('avatar')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="file-input file-input-preview @error('avatar')  is-invalid @enderror" name="avatar" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Məhsul Məlumatları</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-weight"></i>
                                    </div>
                                    <input type="text" name="weight" id="weight" value="{{ optional($product->detail)->weight }}" class="form-control form-control-outline @error('weight') is-invalid @enderror" placeholder="Çəki">
                                    <label class="label-floating">Çəki</label>
                                </div>
                                @error('weight')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="icon-height2"></i>
                                    </div>
                                    <input type="text" name="height" id="height" value="{{ optional($product->detail)->height }}" class="form-control form-control-outline @error('height') is-invalid @enderror" placeholder="Hünürlük">
                                    <label class="label-floating">Hündürlük</label>
                                </div>
                                @error('height')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="icon-height2"></i>
                                    </div>
                                    <input type="text" name="diameter" id="diameter" value="{{ optional($product->detail)->diameter }}" class="form-control form-control-outline @error('diameter') is-invalid @enderror" placeholder="Radius">
                                    <label class="label-floating">Radius</label>
                                </div>
                                @error('diameter')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="icon-circle"></i>
                                    </div>
                                    <input type="text" name="volume" id="volume" value="{{ optional($product->detail)->volume }}" class="form-control form-control-outline @error('volume') is-invalid @enderror" placeholder="Sahə">
                                    <label class="label-floating">Sahə</label>
                                </div>
                                @error('volume')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Seo Məlumatları</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-heading"></i>
                                    </div>
                                    <input type="text" name="title" id="title" value="{{ optional($product->seo)->title }}" class="form-control form-control-outline @error('title') is-invalid @enderror" placeholder="Meta Title">
                                    <label class="label-floating">Meta Title</label>
                                </div>
                                @error('title')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-keyboard"></i>
                                    </div>
                                    <input type="text" name="keywords" id="keywords" value="{{ optional($product->seo)->keywords }}" class="form-control form-control-outline @error('keywords') is-invalid @enderror" placeholder="Meta Açar Sözlər">
                                    <label class="label-floating">Meta Açar Sözlər</label>
                                </div>
                                @error('keywords')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-12 ">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <textarea class="form-control form-control-outline @error('description') is-invalid @enderror" name="description" id="description" placeholder="Meta Description">{{ optional($product->seo)->description }}</textarea>
                                    <label class="label-floating">Meta Description</label>
                                </div>
                                @error('description')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    @error('metaimage')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="file-input file-input-preview-meta @error('metaimage')  is-invalid @enderror" name="metaimage" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Yadda Saxla <i class="fas fa-save ml-2"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
