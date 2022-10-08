<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMeRead</title>
    <link rel="stylesheet" href="{{{asset('public/frontend/css/style1.css')}}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;900&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{{asset('public/frontend/css/sweetalert.css')}}}">
</head>


<body>

    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="{{URL::to('/trang-chu')}}"><img src="{{('public/frontend/images/LogoMakr_9AHYDz.png')}}" width="200px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="{{URL::to('/trang-chu')}}" class="cool-link">Home</a></li>
                        <li><a href="product.html" class="cool-link">Products</a></li>
                        <li><a href="" class="cool-link">About</a></li>
                        <li>
                            <a href="#" class="cool-link">Books<i class="fas fa-caret-down"></i></a>
                            <!-- @foreach($category as $key => $cate) -->
                            <div class="dropdown_menu">
                                @foreach($category as $key => $cate)
                                <ul>
                                    <li style="text-align: left;"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>

                                </ul>
                                @endforeach
                            </div>
                            <!-- @endforeach -->
                        </li>
                        <li>
                            <a href="#" class="cool-link">Author<i class="fas fa-caret-down"></i></a>

                            <div class="dropdown_menu">
                                @foreach($brand as $key => $brand)
                                <ul>
                                    <li style="text-align: left;"><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>

                                </ul>
                                @endforeach
                            </div>
                        </li>
                        <?php
                        $customer_id = Session::get('customer_id');
                        $shipping_id = Session::get('shipping_id');
                        if ($customer_id != NULL && $shipping_id == NULL) {

                        ?>
                            <li><a class="cool-link" href="{{URL::to('/checkout')}}">Checkout</i></a></li>
                        <?php
                        } elseif ($customer_id != NULL && $shipping_id != NULL) {
                        ?>
                            <li><a class="cool-link" href="{{URL::to('/payment')}}">Checkout</i></a></li>
                        <?php

                        } else {
                        ?>
                            <li><a class="cool-link" href="{{URL::to('/login-checkout')}}">Checkout</i></a></li>
                        <?php
                        }
                        ?>

                        <?php
                        $customer_id = Session::get('customer_id');
                        if ($customer_id != NULL) {

                        ?>



                            <li><a class="cool-link" href="{{URL::to('/logout-checkout')}}">Logout Account <i class=" fa fa-lock cool-link"></i></a></li>
                        <?php
                        } else {
                        ?>
                            <li><a class="cool-link" href="{{URL::to('/login-checkout')}}">Login Account <i class=" fa fa-lock cool-link"></i></a></li>
                        <?php
                        }
                        ?>


                    </ul>
                </nav>
                <a href="{{URL::to('/show-cart')}}"><img src="{{('public/frontend/images/shopping-cart.png')}}" width="30px" height="30px"></a>
                <img src="{{('public/frontend/images/menu.png')}}" class="menu-icon" onclick="menutoggle()">
            </div>

        </div>
        <div class="row">

            <img src="{{('public/frontend/images/ea71bb_04fa8a795ad24075b39c085d743035a2_mv2_d_6284_1717_s_2.webp')}}" class="pic" width="100%">


        </div>
    </div>

    <div class="categories">
        @yield('content')

    </div>
    <!-- feature product -->


    <!-- Our story -->
    <h2 class="title">Coming Up Book</h2>
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img class="offer-img" src="{{('public/frontend/images/191123_CodyLidtke_ThoughtCatalog_ZodiacSign_017-e1601403991914.png')}}">
                </div>
                <div class="col-2">
                    <h2>Introducing Zodiac Sign</h2>
                    <br>
                    <h4>By Chrissy Stockton</h4>
                    <br>
                    <h3>When <small style="color: #800000;">July, 17, 2021, 8:00 PM</small></h3>
                    <a class="btn">Book now &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone</p>
                    <div class="app-logo">
                        <img src="{{('public/frontend/images/play-store.png')}}" alt="">
                        <img src="{{('public/frontend/images/app-store.png')}}" alt="">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="{{('public/frontend/images/LogoMakr_9AHYDz.png')}}">
                    <p>Our purpose is inspiring people who like to read book motivation or novel to get more entertainment and education.</p>

                </div>
                <div class="footer-col-3">
                    <h3>Shop</h3>
                    <ul>
                        <a href="shipping&return.html">
                            <li>Shipping & Returns</li>
                        </a>
                        <a href="storepolicy.html">
                            <li>Store Policy</li>
                        </a>
                        <a href="storepolicy.html">
                            <li>Payment Methods</li>
                        </a>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <a href="https://www.facebook.com/ryokorotora">
                            <li>Facebook</li>
                        </a>
                        <a href="https://www.instagram.com/im_near_i_roth/?hl=en">
                            <li>Instagram</li>
                        </a>
                        <a href="https://www.pinterest.com/oudomsothirak/_saved/">
                            <li>Pinterest</li>
                        </a>



                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">@2021 by BookMeRead. Proudly created with Rotora </p>
        </div>
    </div>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            swal("Here's a message!", "It's pretty, isn't it?")

        });
    </script>
</body>

</html>