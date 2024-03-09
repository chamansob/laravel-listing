<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
     <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Admin') }} - @yield('title') </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/src/assets/img/favicon.ico')}}"/>
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/assets/layouts/vertical-light-menu/loader.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('backend/assets/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
 <!-- Toastr styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <!-- End layout styles -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('backend/assets/src/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/src/assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/src/assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/src/assets/color.css')}}" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('backend/assets/src/assets/css/light/components/font-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/src/assets/css/dark/components/font-icons.css')}}" rel="stylesheet" type="text/css">
    
     <link href="{{ asset('backend/assets/src/assets/css/light/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('backend/assets/src/assets/css/light/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/src/plugins/src/sweetalerts2/sweetalerts2.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('backend/assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets//src/plugins/css/dark/sweetalerts2/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/assets/src/plugins/src/table/datatable/datatables.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/src/plugins/css/light/table/datatable/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/src/plugins/css/dark/table/datatable/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/src/plugins/src/select2/select2.min.css')}}" rel="stylesheet" type="text/css">
   
<style>
    .ck-editor__editable[role="textbox"] {
                /* Editing area */
                min-height: 200px;
            }
            .ck-content .image {
                /* Block images */
                max-width: 80%;
                margin: 20px auto;
            }
</style>
   <!-- Scripts -->
     @vite(['resources/js/app.js'])
</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
      @include('admin.body.nav')
      
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
         @include('admin.body.side')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!--  BEGIN BREADCRUMBS  -->
                    @include('admin.body.breadcrumbs')
                    <!--  END BREADCRUMBS  -->
                    
                    <div class="row layout-top-spacing">

                       {{ $slot }}

                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            @include('admin.body.footer')
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

   
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
 <script src="{{ asset('backend/assets/src/plugins/src/global/vendors.min.js')}}"></script>
 <script src="{{ asset('backend/assets/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{ asset('backend/assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
 <script src="{{ asset('backend/assets/src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
 <script src="{{ asset('backend/assets/src/plugins/src/waves/waves.min.js')}}"></script>
 <script src="{{ asset('backend/assets/layouts/vertical-light-menu/app.js')}}"></script>
  <script src="{{ asset('backend/assets/src/assets/js/custom.js')}}"></script>
 <!-- END GLOBAL MANDATORY SCRIPTS -->
<!-- Toastr js for this page -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    
 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
 <script src="{{ asset('backend/assets/src/plugins/src/apex/apexcharts.min.js')}}"></script>
 <script src="{{ asset('backend/assets/src/assets/js/dashboard/dash_1.js')}}"></script>
 <script src="{{ asset('backend/assets/src/assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
 <script src="{{ asset('backend/assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js')}}"></script>
 {{-- <script src="{{ asset('backend/assets/src/plugins/src/sweetalerts2/custom-sweetalert.js')}}"></script> --}}
 <script src="{{ asset('backend/assets/src/plugins/src/font-icons/feather/feather.min.js')}}"></script>
 <script type="text/javascript">
    feather.replace();
</script>
 <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('backend/assets/src/plugins/src/table/datatable/datatables.js')}}"></script>
    <script src="{{ asset('backend/assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('backend/assets/src/plugins/src/table/datatable/button-ext/jszip.min.js')}}"></script>    
    <script src="{{ asset('backend/assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('backend/assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    <script src="{{ asset('backend/assets/src/plugins/src/table/datatable/custom_miscellaneous.js')}}"></script>

    <script src="{{ asset('backend/assets/src/plugins/src/select2/select2.min.js')}}"></script>
   
   <script>$(".tagging").select2({
	tags: true
});</script>
   
    <!-- END PAGE LEVEL SCRIPTS --> 
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>
     <script>
            // This sample still does not showcase all CKEditor&nbsp;5 features (!)
            // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
            CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: '',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22,24 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        },{ name: "span", attributes: true, classes: true, styles: true }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            });
        </script>   
</body>
</html>