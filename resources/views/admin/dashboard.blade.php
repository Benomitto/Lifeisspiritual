@extends('layouts.master')

@section('title')
	Dashboard
@endsection

@section('content')
	       <div class="row">
							
							<div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-waterlily animation-fadeIn">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            <strong>Home</strong><br>
											<span class="font-weight-bold">{{$welcomes->count()}}</span>
                                        </h3>
                                    </div>
                                </a>
								<!-- Blog -->
                                <!-- END Widget -->
                            </div>
							
							<div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                            <i class="fa fa-question-circle"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            <strong>About</strong><br>
											<span class="font-weight-bold">{{$abouts->count()}}</span>
                                        </h3>
                                    </div>
                                </a>
								<!-- Blog -->
                                <!-- END Widget -->
                            </div>
		   
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
								
                                <a class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-danger animation-fadeIn">
                                            <i class="fa fa-shopping-basket"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            <strong>Products</strong><br>
											<span class="font-weight-bold">{{$products->count()}}</span>
                                        </h3>
                                    </div>
                                </a>
								
								<!-- Blog -->
                                <!-- END Widget -->
                            </div>
							
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a  class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                                            <i class="fa fa-opera"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                             <strong>Orders</strong><br>
                                            <span class="font-weight-bold">{{$orders->count()}}</span>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
							
                            
                            
                            <div class="col-sm-6">
                                <!-- Widget -->
                                 <a href="page_comp_charts.html" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background animation-fadeIn">
                                            <i class="gi gi-wallet"></i>
                                        </div>
                                        <div class="pull-right">
                                             <!--Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about-->
                                             <span id="mini-chart-sales"></span>
                                        </div>
                                        <h3 class="widget-content animation-pullDown visible-lg">
                                            Latest <strong>Sales</strong>
                                            <small>Per hour</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                             <!--</div>-->
                        </div>
						<div class="row">
                            
							
							<div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
									  <a  class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background animation-fadeIn">
                                            <i class="fa fa-rss"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                             <strong>Blog</strong><br>
                                            <span class="font-weight-bold">{{$blogs->count()}}</span>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
							
							
							
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a  class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-night animation-fadeIn">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                             <strong>Gallery</strong><br>
                                            <span class="font-weight-bold">{{$galleries->count()}}</span>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
							
							<div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
									 <a  class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                             <strong>Users</strong><br>
                                            <span class="font-weight-bold">{{$users->count()}}</span>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                        </div>
@endsection

@section('scripts')

@endsection