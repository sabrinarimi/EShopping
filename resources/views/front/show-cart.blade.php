
<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="{{asset('/')}}home/width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('/')}}home/images/logo1.png" type="">
    <title>Product Detail</title>
    <!-- bootstrap core css -->
    @include('front.css')
</head>
<body>
@include('front.header')
<section class="py-5">

        <div class="row">
            <div class="col-md-10 mx-auto">
                <table class="table table-responsive ">
                    <thead class="bg-danger">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>

                    <?php $totalPrice =0; ?>
                    @foreach($carts as $cart)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cart->product_title}}</td>
                            <td>{{$cart->price}} BDT</td>
                            <td>
                                {{$cart->quantity}}
                            </td>
                            <td>
                                <img src="{{$cart->image}}" class="" alt="" style="height: 80px;width: 80px ;border-radius: 0">
                            </td>

                            <td>
{{--                                <form action="{{route('delete-cart',$cart->id)}}" onclick="return confirm('Are you sure to delete this?')"  method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <input type="submit" class="btn btn-danger ml-2 " value="delete"/>--}}
{{--                                </form>--}}
                                <a href="{{route('delete-cart',$cart->id)}}" class="btn btn-danger">remove cart</a>
                            </td>
                        </tr>

                        <?php  $totalPrice = $totalPrice + $cart->price  ?>

                    @endforeach


                    </tbody>
                </table>
                <div>
                    <h1 class="text-danger">Total Price is : {{$totalPrice}} BDT</h1>
                </div>
                <div class="mx-auto">
                    <h2>Proceed To Order</h2>
                    <a href="{{route('cash-order')}}" class="btn btn-danger">Cash On delivery</a>
                    <a href="" class="btn btn-danger">Pay using Card </a>
                </div>

            </div>
        </div>

</section>



<!-- footer start -->


<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
@include('front.js')
</body>
</html>


