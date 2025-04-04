<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ PROJECT_NAME }} @yield('title','') </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <link rel="stylesheet" href="https://www.ville-pont-eveque.fr/tools/library/DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://www.ville-pont-eveque.fr/tools/library/DataTables/extensions/Select/css/select.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/dashboard.css')}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    @if(Auth::user()->design_layout == 0)
    <link href="{{ url('public/frontEnd/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontEnd/css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontEnd/css/developer.css') }}" rel="stylesheet">
    @else
    <link href="{{ url('public/frontEnd/css/dyslexia/dyslexia_style.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontEnd/css/dyslexia/dyslexia_style-responsive.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontEnd/css/dyslexia/dyslexia_developer.css') }}" rel="stylesheet">
    @endif
    <style>
        .select-dyslexia {
            float: right;
        }

        .select-dyslexia select {
            background-color: #1f88b5;
        }

        .select-dyslexia select>option {
            background-color: #1f88b5;
        }

        section.main_section_page {
            padding: 90px 20px 20px !important;
            background-color: #fff;
        }

        .new_header {
            height: 80px;
        }

        .new_header .brand a span {
            color: #fff;
        }

        .horizontal-menu {
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <header class="header fixed-top">
        <div class="new_header">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="brand">
                        <a href="{{ url('/') }}" class="logo">
                            <span>SCITS </span>
                        </a>
                    </div>
                    <div class="horizontal-menu ">
                        <div class="wlcome-header"> Welcome Back, </div>
                    </div>
                </div>
                <div class="col-md-7 d-flex justify-content-end">
                    <div class="theme_btn">
                        <?php
                        if (Auth::check()) {
                            $design_layout_id = Auth::user()->design_layout;
                        } else {
                            $design_layout_id = '0';
                        }
                        ?>
                        <div class="select-dyslexia">
                            <select class="profileDrop border-0 me-4 sel_design_layout" name="design_layout_id">
                                <option value="0" <?php if (isset($design_layout_id)) {
                                                        if ($design_layout_id == '0') {
                                                            echo "selected";
                                                        }
                                                    } ?>>Default</option>
                                <option value="1" <?php if (isset($design_layout_id)) {
                                                        if ($design_layout_id == '1') {
                                                            echo "selected";
                                                        }
                                                    } ?>>Dyslexia</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script>
        $(document).ready(function() {
            $(document).on('change', '.sel_design_layout', function() {

                var design_layout_id = $('select[name=design_layout_id]').val();
                var normal_layout_id = "{{ url('/change-design-layout/0') }}";
                var dyslexia_layout_id = "{{ url('/change-design-layout/1') }}";
                var no_layout_id = "{{ url('/') }}";
                if (design_layout_id == '0') {
                    location.href = normal_layout_id;
                } else if (design_layout_id == '1') {
                    location.href = dyslexia_layout_id;
                } else {
                    location.href = no_layout_id;
                }
            });
        });
    </script>