<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../Layout/Css/bootstrap.css">
    <link rel="stylesheet" href="../../Layout/Css/all.min.css">
    <link rel="stylesheet" href="../../Layout/Css/bootstrap-datetimepicker.min.css" media="screen">
    <style>
    element.style {}

    .thumb-slide {
        overflow: hidden;
    }

    .thumb-rounded,
    .thumb-rounded img,
    .thumb-rounded .caption-overflow {
        border-radius: 50%;
    }

    .thumb-rounded {
        width: 20%;
        margin: 20px auto 0 auto;
    }

    .thumb {
        position: relative;
        display: block;
    }

    .panel {
        margin-bottom: 20px;
        border-color: #ddd;
        color: #333333;
    }

    .panel {
        padding:20px;
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 3px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }
    .panel-body {
        position: relative;
    }

    .panel-body {
        padding: 20px;
    }
    .panel {
        margin-bottom: 20px;
        border-color: #ddd;
        color: #333333;
    }
    </style>

</head>

<body>
    <div class="row" style="margin:50px;padding:20px;">
        <div class="col col-12">
            <div class="card">
                <div class="thumb thumb-rounded thumb-slide" style="padding:10px">
                    <img src="image/1588478002_amr.jpg" width="160px" height="250px" class="card-img-top" alt="...">
                </div>

                <div class="row" style="margin:0px;background:#f5f5f5; padding:20px">
                    <div class="col-sm-6">
                        <div class="panel border-left-lg border-left-danger invoice-grid timeline-content">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="text-semibold no-margin-top">Profile
                                            Information</h6>
                                        <ul class="list list-unstyled">
                                            <li>Name : </li>
                                            <li>Specialization: <span class="text-semibold"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="text-semibold text-right no-margin-top">-</h6>
                                        <ul class="list list-unstyled text-right">
                                            <li>Fees: <span class="text-semibold"></span>
                                            </li>
                                            <li>Designation: <span class="text-semibold"></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i
                                        class="icon-more"></i></a>
                                <div class="container">
                                    <span class="heading-text">
                                        <span class="status-mark border-danger position-left"></span>
                                        Contact Number: <span class="text-semibold"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel border-left-lg border-left-success invoice-grid timeline-content">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="text-semibold no-margin-top">Consulting
                                            Details</h6>
                                        <ul class="list list-unstyled">
                                            <li>Shift : </li>
                                            <li>Room Number: <span class="text-semibold"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                     
                                        <ul class="list list-unstyled text-right">
                                        <li>Fees: <span class="text-semibold"></span>
                                            </li>
                                            <li>In Time: <span class="text-semibold"></span>
                                            </li>
                                            <li>Out Time: <span class="text-semibold"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i
                                        class="icon-more"></i></a>
                                <div class="heading-elements container">
                                    <span class="heading-text">
                                        <span class="status-mark border-success  position-left"></span>Consulting
                                        Days: <span class="text-semibold"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="panel border-left-lg border-left-primary invoice-grid timeline-content">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="text-semibold no-margin-top">Outside
                                            Consulting Details</h6>
                                        <ul class="list list-unstyled">
                                            <li>Shift :</li>
                                            <li>Consultant Fees: <span class="text-semibold">-</span></li>
                                            <li>Consultant Extra Fees: <span class="text-semibold"></span></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6 class="text-semibold text-right no-margin-top">
                                            Fees:</h6>
                                        <ul class="list list-unstyled text-right">
                                            <li>In Time: <span class="text-semibold">-</span></li>
                                            <li>Out Time: <span class="text-semibold">-</span></li>
                                            <li>Address: <span class="text-semibold">-</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i
                                        class="icon-more"></i></a>
                                <div class="heading-elements">
                                    <span class="heading-text">
                                        <span class="status-mark border-primary position-left"></span>Consulting
                                        Days: <span class="text-semibold"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $js ?>jquery.js"></script>
    <script src="<?php echo $js ?>bootstrap.min.js"></script>
</body>