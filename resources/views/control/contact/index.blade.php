@extends('layouts.admin')
@section('title', 'Admin Dashboard | Əlaqə')
@section('_scripts')
    <!-- Theme JS files -->
    <script src="{{ _adminJs('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>

    <script src="{{ _adminJs('demo_pages/uploader_bootstrap.js') }}"></script>

    <script src="{{ _adminJs('app.js') }}"></script>
    @if (!is_null(optional($contact->seo)->metaimage))
        <script>
            var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
                '  <div class="modal-content">\n' +
                '    <div class="modal-header align-items-center">\n' +
                '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
                '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
                '    </div>\n' +
                '    <div class="modal-body">\n' +
                '      <div class="floating-buttons btn-group"></div>\n' +
                '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
                '    </div>\n' +
                '  </div>\n' +
                '</div>\n';


            var previewZoomButtonClasses = {
                toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
                fullscreen: 'btn btn-light btn-icon btn-sm',
                borderless: 'btn btn-light btn-icon btn-sm',
                close: 'btn btn-light btn-icon btn-sm'
            };

            // Icons inside zoom modal classes
            var previewZoomButtonIcons = {
                prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
                next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
                toggleheader: '<i class="icon-menu-open"></i>',
                fullscreen: '<i class="icon-screen-full"></i>',
                borderless: '<i class="icon-alignment-unalign"></i>',
                close: '<i class="icon-cross2 font-size-base"></i>'
            };

            // File actions
            var fileActionSettings = {
                zoomClass: '',
                zoomIcon: '<i class="icon-zoomin3"></i>',
                dragClass: 'p-2',
                dragIcon: '<i class="icon-three-bars"></i>',
                // removeClass: '',
                // removeErrorClass: 'text-danger',
                // removeIcon: '<i class="icon-bin"></i>',
                indicatorNew: '<i class="icon-file-plus text-success"></i>',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorError: '<i class="icon-cross2 text-danger"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
            };
            $('.file-input-preview').fileinput({
                browseLabel: 'Browse',
                browseIcon: '<i class="icon-file-plus mr-2"></i>',
                uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
                // removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                layoutTemplates: {
                    icon: '<i class="icon-file-check"></i>',
                    modal: modalTemplate
                },
                initialPreview: [
                    '{{ _img($contact->seo->metaimage) }}',
                ],
                initialPreviewConfig: [{
                        caption: 'Image',
                        size: 930321,
                        key: 1,
                        url: '{$url}',
                        showDrag: false
                    },

                ],
                initialPreviewAsData: true,
                overwriteInitial: false,
                maxFileSize: 100,
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons,
                fileActionSettings: fileActionSettings
            });
        </script>
    @endif
@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Əlaqə</span></h4>
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
                    <span class="breadcrumb-item active">Əlaqə {{optional($contact->seo)->metaimage}}</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <form action="{{ route('system.contact.update') }}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    @csrf
                    @method('patch')
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Əlaqə Məlumatları</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-at"></i>
                                    </div>
                                    <input type="text" name="email" id="email" value="{{ optional($contact)->email }}" class="form-control form-control-outline @error('email') is-invalid @enderror" placeholder="E-Poçt">
                                    <label class="label-floating">E-Poçt</label>
                                </div>
                                @error('email')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fab fa-linkedin"></i>
                                    </div>
                                    <input type="text" name="linkedin" id="linkedin" value="{{optional($contact)->linkedin }}" class="form-control form-control-outline @error('linkedin') is-invalid @enderror" placeholder="Linkedin">
                                    <label class="label-floating">Linkedin</label>
                                </div>
                                @error('linkedin')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <input type="text" name="phone" id="phone" value="{{ optional($contact)->phone }}" class="form-control form-control-outline @error('phone') is-invalid @enderror" placeholder="Əlaqə Nömrəsi">
                                    <label class="label-floating">Əlaqə Nömrəsi</label>
                                </div>
                                @error('phone')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fab fa-twitter"></i>
                                    </div>
                                    <input type="text" name="twitter" id="twitter" value="{{ optional($contact)->twitter }}" class="form-control form-control-outline @error('twitter') is-invalid @enderror" placeholder="Twitter">
                                    <label class="label-floating">Twitter</label>
                                </div>
                                @error('twitter')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                    <input type="text" name="whatsapp" id="whatsapp" value="{{ optional($contact)->whatsapp }}" class="form-control form-control-outline @error('whatsapp') is-invalid @enderror" placeholder="Whatsapp">
                                    <label class="label-floating">Whatsapp</label>
                                </div>
                                @error('whatsapp')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                    <input type="text" name="instagram" id="instagram" value="{{ optional($contact)->instagram }}" class="form-control form-control-outline @error('instagram') is-invalid @enderror" placeholder="Instagram">
                                    <label class="label-floating">Instagram</label>
                                </div>
                                @error('instagram')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fab fa-telegram-plane"></i>
                                    </div>
                                    <input type="text" name="telegram" id="telegram" value="{{ optional($contact)->telegram }}" class="form-control form-control-outline @error('telegram') is-invalid @enderror" placeholder="Telegram">
                                    <label class="label-floating">Telegram</label>
                                </div>
                                @error('telegram')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fab fa-facebook"></i>
                                    </div>
                                    <input type="text" name="facebook" id="facebook" value="{{optional( $contact)->facebook }}" class="form-control form-control-outline @error('facebook') is-invalid @enderror" placeholder="Facebook">
                                    <label class="label-floating">Facebook</label>
                                </div>
                                @error('facebook')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12148.724241339452!2d49.82483165!3d40.4269895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2s!4v1662824775848!5m2!1str!2s" style="width: 100%;height: 500px;border:0;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
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
                                    <input type="text" name="title" id="title" value="{{ optional($contact->seo)->title }}" class="form-control form-control-outline @error('title') is-invalid @enderror" placeholder="Meta Title">
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
                                    <input type="text" name="keywords" id="keywords" value="{{ optional($contact->seo)->keywords }}" class="form-control form-control-outline @error('keywords') is-invalid @enderror" placeholder="Meta Açar Sözlər">
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
                                    <textarea class="form-control form-control-outline @error('description') is-invalid @enderror" name="description" id="description" placeholder="Meta Description">{{ optional($contact->seo)->description }}</textarea>
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
                                    <input type="file" class="file-input file-input-preview @error('metaimage')  is-invalid @enderror" name="metaimage" data-show-caption="false" data-show-upload="false" data-fouc>
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
