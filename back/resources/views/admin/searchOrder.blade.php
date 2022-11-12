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
                    <h2 class="h2_font" >Search Order</h2>

                    <form action="{{route('order.search')}}" method="POST">
                        @csrf
                        <input type="text" name="category" placeholder="Search by user Name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Search" >
                    </form>
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
                        @isset($product)
                        @foreach($product as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <img src="/product/{{$product->image}}" class="img_size">
                            </td>
                            <td>
                                <a href="{{route('product.edit', $product['id'])}}" class="btn btn-success">Edit</a>
                                <form style="display:inline;" method="POST" action="{{route('product.destroy', $product['id'])}}">
                                    @csrf
                                    <button class="btn btn-secondary">Pending</button>
                                    <button class="btn btn-success">Accepted</button>
                                    <button class="btn btn-danger">Rejected</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
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
