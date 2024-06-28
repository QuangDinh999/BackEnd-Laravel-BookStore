<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/user-management-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 02:35:31 GMT -->
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Management Admin</title>
{{--    <link rel="icon" href="img/mini_logo.png" type="image/png">--}}

    <link rel="stylesheet" href="{{asset('')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/themefy_icon/themify-icons.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/niceselect/css/nice-select.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/owl_carousel/css/owl.carousel.css')}}"/>

    <link rel="stylesheet" href="'asset{{('vendors/gijgo/gijgo.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/font_awesome/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/tagsinput/tagsinput.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/datepicker/date-picker.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/vectormap-home/vectormap-2.0.2.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/scroll/scrollable.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/datatable/css/jquery.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/datatable/css/responsive.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/datatable/css/buttons.dataTables.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/text_editor/summernote-bs4.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendors/morris/morris.css')}}">

    <link rel="stylesheet" href="{{asset('vendors/material_icon/material-icons.css')}}"/>

    <link rel="stylesheet" href="{{asset('css/metisMenu.css')}}">

    <link rel="stylesheet" href="{{asset('css/style1.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/colors/default.css')}}" id="colorSkinCSS">
</head>
<body class="crm_body_bg">


@include('component.sidebar')

<section class="main_content dashboard_part large_header_bg">

    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                @include('component.header')
            </div>
        </div>
    </div>

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Data table 1</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>shorting Arrow</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                    <button type="submit"><i class="ti-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ms-2">
                                            <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">Add
                                                New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table id="table-content" class="table lms_table_active3 ">
                                        <thead>
                                        <tr>
                                            <th scope="col">title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Category</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row"><a href="#" class="question_content"> title here 1</a></th>
                                            <td>Category name</td>
                                            <td><a href="#" class="status_btn">Active</a></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#">
                            Dashboard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="js/jquery1-3.4.1.min.js"></script>

<script src="js/popper1.min.js"></script>

<script src="js/bootstrap1.min.js"></script>

<script src="js/metisMenu.js"></script>

<script src="vendors/count_up/jquery.waypoints.min.js"></script>

<script src="vendors/chartlist/Chart.min.js"></script>

<script src="vendors/count_up/jquery.counterup.min.js"></script>

<script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatable/js/buttons.flash.min.js"></script>
<script src="vendors/datatable/js/jszip.min.js"></script>
<script src="vendors/datatable/js/pdfmake.min.js"></script>
<script src="vendors/datatable/js/vfs_fonts.js"></script>
<script src="vendors/datatable/js/buttons.html5.min.js"></script>
<script src="vendors/datatable/js/buttons.print.min.js"></script>

<script src="vendors/datepicker/datepicker.js"></script>
<script src="vendors/datepicker/datepicker.en.js"></script>
<script src="vendors/datepicker/datepicker.custom.js"></script>
<script src="js/chart.min.js"></script>
<script src="vendors/chartjs/roundedBar.min.js"></script>

<script src="vendors/progressbar/jquery.barfiller.js"></script>

<script src="vendors/tagsinput/tagsinput.js"></script>

<script src="vendors/text_editor/summernote-bs4.js"></script>
<script src="vendors/am_chart/amcharts.js"></script>

<script src="vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="vendors/scroll/scrollable-custom.js"></script>

<script src="vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
<script src="vendors/vectormap-home/vectormap-world-mill-en.js"></script>

<script src="vendors/apex_chart/apex-chart2.js"></script>
<script src="vendors/apex_chart/apex_dashboard.js"></script>

<script src="vendors/chart_am/core.js"></script>
<script src="vendors/chart_am/charts.js"></script>
<script src="vendors/chart_am/animated.js"></script>
<script src="vendors/chart_am/kelly.js"></script>
<script src="vendors/chart_am/chart-custom.js"></script>

<script src="js/dashboard_init.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/user-management-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 02:36:17 GMT -->
</html>
