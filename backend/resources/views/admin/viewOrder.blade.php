<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css" >
        .div_center{
            text-align: center;
            padding-top: 40px;
        }

        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }

        .close{
            background: transparent;
            border: none;
            outline: none;
            width: 16px;
            padding-right: 20px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h2 class="h2_font" >All orders</h2>

                    {{-- <form action="{{route('category.add')}}" method="POST">
                        @csrf
                        <input type="text" name="category" placeholder="Search by user Name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Search" >
                    </form> --}}
                </div>

                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $order)
                        <tr>
                            <td>{{$order->title}}</td>
                            <td>{{$order->description}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->category}}</td>
                            <td>{{$order->price}}</td>
                            <td>
                                <img src="/product/{{$order->image}}" class="img_size">
                            </td>
                            <td>jhkhk</td>
                            <td>lkjj</td>
                            <td>lkjj</td>
                            {{-- {{$order->title}} --}}
                            <th>{{$order->username}}</th>
                            <th>{{$order->useremail}}</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Image</th>

                            <td>
                                {{-- <a href="{{route('product.edit', $product['id'])}}" class="btn btn-success">Edit</a> --}}
                                <form style="display:inline;" method="POST" action="{{route('product.destroy', $order['id'])}}">
                                    @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Do you want to Delete this Category?')">Pending</button>
                                        <button class="btn btn-info" onclick="return confirm('Do you want to Delete this Category?')">Delete</button>
                                        <button class="btn btn-success" onclick="return confirm('Do you want to Delete this Category?')">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
