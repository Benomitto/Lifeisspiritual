
	<section id="contact" class="ts-separate-bg-element" data-bg-image="assets/img/bg-hand-mobile.jpg" data-bg-image-opacity=".1" data-bg-color="#12264f">
<footer class="footer-section">
        <div class="container">
         
            <div class="footer-content pt-5 pb-5 ">
			  	@if(Session::has('success'))
            <div class="flash alert-success">
                <p>{{Session::get('success')}}</p>
            </div>
        @endif 
                <div class="row d-flex justify-content-around">
                    <div class="col-md-3 mb-50">
                        <div class="footer-widget">
						<div class="footer-widget-heading">
                                <h5 class="text-white-50">Life Is Spiritual</h5>
                            </div>
                            <div class="footer-text">
                                <p class="text-justify">Life Is Spiritual Ministries (LIS), is a non denominational christian discipleship ministry with a goal to see
								 the Gospel of the Kingdom of Goad spread to the entire world.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class=" col-md-3">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h5 class="text-white-50">Quick Links</h5>
                            </div>
                            <ul>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
					 <div class=" col-md-3">
					 <div class="footer-widget">
					<div class="footer-social-icon">
					<div class="footer-widget-heading">
                                <h5 class="text-white-50">Follow us</h5>
                                <a href="#"><i class="text-white-50 fab fa-facebook-f"></i></a>
                                <a href="#"><i class="text-white-50 fab fa-instagram"></i></a> 
								</div>
                     </div>
					 </div>
					 </div>
					
                    <div class="col-md-3 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h5 class="text-white-50">Subscribe to Our Newsletter</h5>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Promotions, new products and sales. Directly in your inbox</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="/newsletter" method="post">
								@csrf
                                    <input id="email" name="email" type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
									@error('email')
										<span class="text-xs text-danger">{{$message}}</span>
									@enderror
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
				</section>
				
