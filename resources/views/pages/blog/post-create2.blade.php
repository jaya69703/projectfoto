@extends('base.base-index')
@section('custom-css')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" href="{{ asset('main') }}/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="{{ asset('main') }}/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/src/tagify/tagify.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/tagify/custom-tagify.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/tagify/custom-tagify.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/dark/forms/switches.css">
    <link href="{{ asset('main') }}/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/editors/quill/quill.snow.css">
    <link href="{{ asset('main') }}/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('main') }}/src/assets/css/light/apps/blog-create.css">
    <link rel="stylesheet" href="{{ asset('main') }}/src/assets/css/dark/apps/blog-create.css">
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('content')
<div class="row mb-4 layout-spacing layout-top-spacing">

    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

        <div class="widget-content widget-content-area blog-create-section">

            <div class="row mb-4">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="post-title" placeholder="Post Title">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm-12">
                    <label>Content</label>
                    <div id="blog-description"></div>
                </div>
            </div>

        </div>

        <div class="widget-content widget-content-area blog-create-section mt-4">

            <h5 class="mb-4">SEO Settings</h5>

            <div class="row mb-4">
                <div class="col-xxl-12 mb-4">
                    <input type="text" class="form-control" id="post-meta-title" placeholder="Meta Title">
                </div>
                <div class="col-xxl-12">
                    <label for="post-meta-description">Meta Description</label>
                    <textarea name="post-meta-description" class="form-control" id="post-meta-description" cols="10" rows="5"></textarea>
                </div>
            </div>

        </div>

    </div>

    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
        <div class="widget-content widget-content-area blog-create-section">
            <div class="row">
                <div class="col-xxl-12 mb-4">
                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                        <input class="switch-input" type="checkbox" role="switch" id="showPublicly" checked>
                        <label class="switch-label" for="showPublicly">Publish</label>
                    </div>
                </div>
                <div class="col-xxl-12 mb-4">
                    <div class="switch form-switch-custom switch-inline form-switch-primary">
                        <input class="switch-input" type="checkbox" role="switch" id="enableComment" checked>
                        <label class="switch-label" for="enableComment">Enable Comments</label>
                    </div>
                </div>
                <div class="col-xxl-12 col-md-12 mb-4">
                    <label for="tags">Tags</label>
                    <input id="tags" class="blog-tags" value="">
                </div>

                <div class="col-xxl-12 col-md-12 mb-4">
                    <label for="category">Category</label>
                    <input id="category" name="category" placeholder="Choose...">
                </div>

                <div class="col-xxl-12 col-md-12 mb-4">

                    <label for="product-images">Featured Image</label>
                    <div class="multiple-file-upload">
                        <input type="file"
                            class="filepond file-upload-multiple"
                            name="filepond"
                            id="product-images"
                            multiple
                            data-allow-reorder="true"
                            data-max-file-size="3MB"
                            data-max-files="5">
                    </div>

                </div>

                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                    <button class="btn btn-success w-100">Create Post</button>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
@section('custom-js')
<script src="{{ asset('main') }}/src/plugins/src/editors/quill/quill.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/filepond/filepond.min.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>

<script src="{{ asset('main') }}/src/plugins/src/tagify/tagify.min.js"></script>

<script src="{{ asset('main') }}/src/assets/js/apps/blog-create.js"></script>
@endsection

