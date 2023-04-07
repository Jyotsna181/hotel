      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                                 <a class="nav-link" href="{{ url('/')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contact us</a>
                              </li>
                           </ul>
                           @if (Route::has('login'))
                                <div class="nav-item">
                                    @auth
                                    <div class="sign_btn">
                                       <a href="{{route('bookings.view')}}">Go to Dashboard</a>
                                        <a class="text-decoration-none btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    @else
                                        <div class="sign_btn">
                                            <a href="{{ route('login') }}" class="text-decoration-none btn sign_btn">Sign in</a>
                                        </div>
                                    @endauth
                                </div>
                            @endif
                           
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main" style="background-image: url('assets/images/banner.jpg');
     background-repeat: no-repeat;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-bg">
                     <div class="padding_lert">
                        <h1>WELCOME TO HOTEL Felicity </h1>
                        <span>LANDING PAGE 2019</span>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                        <a href="#">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- form_lebal -->
      <section>
         <div class="container mb-5">
            <div class="row">
               <div class="col-md-12">
                  <form class="form_book" action="{{ url('bookings/index')}}">
                     <div class="row">
                        <div class="col-md-3">
                           <label class="date">ARRIVAL DATE</label>
                           <input class="book_n" name="checkin_date"  type="date" required>
                        </div>
                        <div class="col-md-3">
                           <label class="date">DEPARTURE DATE</label>
                           <input class="book_n" name="checkout_date"  type="date" required>
                        </div>
                        <div class="col-md-3">
                           <label class="date">PERSON</label>
                           <input class="book_n" placeholder="2" type="type" name="adult" required>
                        </div>
                        <div class="col-md-3">
                           <a href="{{ url('bookings/index')}}"><button class="book_btn" >Book Now</button></a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <!-- end form_lebal -->