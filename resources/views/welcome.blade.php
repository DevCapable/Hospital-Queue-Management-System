<!DOCTYPE html>
<html>

<!-- Mirrored from jltoken.justlabtech.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jan 2020 07:10:58 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name=msapplication-tap-highlight content=no>
<title>Queue Management System</title>
<link rel=icon href="{{asset('frontend/assets/favicon.ico')}}">
<link href="{{asset('frontend/assets/css%2c_materialize.min.css%2bcss%2c_style.min.css%2bcss%2c_layouts%2c_page-center.css%2bjs%2c_plugins%2c_prism%2c_prism.css%2bjs%2c_plugins%2c_perfect-scrollbar%2c_perfect-scrollbar.css.pagespeed.cc.q4m5GI8jBK.css')}}" type="text/css" rel=stylesheet media="screen,projection"/>

</head>
<body class=teal>
<div id=loader-wrapper>
<div id=loader></div>
<div class="loader-section section-left"></div>
<div class="loader-section section-right"></div>
</div>
<div id=login-page class=row>
<div class="col s12 z-depth-4 card-panel">
    <div id="login-page" class="row">
        <div class="input-field col s12 center p-0">
            <strong style="align-content: center; font-family: 'Times New Roman'; font-size: 30px; font-weight: bold">Medical e-Consultation Resource and Queuing System
            </strong>
            <p style="color: red"> (A Case Study of University of Ilorin Teaching Hospital).</p>
        </div>
        <div class="col s12">

            <div class="z-depth-4 card-panel" style="width: 300px; margin: auto;">
                <p class="center login-form-text" style="letter-spacing:1px">Take Service</p>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" style="color: red">
                            <button type="button" aria-label="Close" class="close" onclick="this.parentElement.style.display='none'">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <span><b>Danger - </b>{{ $error }}</span>
                        </div>
                    @endforeach
                @endif

                @if(session('successMsg'))
                    <div class="alert alert-success" style="color: green">
                        <button type="button" aria-label="Close" class="close" onclick="this.parentElement.style.display='none'">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <span><b>Success - </b>{{ session('successMsg') }}</span>
                    </div>
                @endif

                <form class="login-form" method="post" action="{{ route('queue.reserve') }}">
                    @csrf
                    <div class="row">

                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-box prefix"></i>
                            <input id="username" type="text" name="name" placeholder="customername" value="" autofocus>
                            <label for="username" class="active">Customer Name</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-assignment prefix"></i>
                            <input id="username" type="text" name="service" placeholder="servicename" value="" autofocus>
                            <label for="username" class="active">Service Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn waves-effect waves-light col s12">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">All Available Patients on Queues</h4>
                                <marquee behavior="10" direction="right"><strong style="color: red">{{$notification->message}}</strong></marquee>
                                <audio id="myAudio">
                                    <source src="{{asset('backend/customer.M4A')}}" type="audio/mpeg">
                                </audio>
                            </div>
                            <div class="card-content table-responsive">
                                <table id="table" class="table"  cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Service Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
{{--                                    <th>Action</th>--}}
                                    </thead>
                                    <tbody>
                                    @foreach($queues as $key=>$queue)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $queue->name }}</td>
                                            <td>{{ $queue->service }}</td>

                                            <th>
                                                @if($queue->status == true)
                                                    <span style="color: green">Called</span>
                                                @else
                                                    <span style="color: red">not Called yet</span>
                                                @endif

                                            </th>
                                            <td>{{ $queue->created_at }}</td>
                                        </tr>
                                    @endforeach
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
</div>


<div class="row center-align white-text" style=margin-bottom:0>
<span>Developed by <a href="https://github.com/DevCapable/Hospital-Queue-Management-System" target=_blank style="color:#ccc">Dev Capable</a></span>
</div>
</div>
<script src="{{asset('frontend/assets/js/plugins/jquery-1.11.2.min.js.pagespeed.jm.J-8M9bCq0j.js')}}"></script>
<script src="{{asset('frontend/assets/js/materialize.min.js.pagespeed.ce.iYJ7cbN9Ev.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/prism/prism.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins%2c_perfect-scrollbar%2c_perfect-scrollbar.min.js%2bplugins.min.js.pagespeed.jc.v_7n8RyfbT.js')}}"></script>


<script>eval(mod_pagespeed_a5mfZXeHps);</script>
<script>eval(mod_pagespeed_sSsjFjS4KJ);</script>
<script>function load(){$('body').removeClass('loaded');return true;}</script>
</body>

<!-- Mirrored from jltoken.justlabtech.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jan 2020 07:11:00 GMT -->
</html>
