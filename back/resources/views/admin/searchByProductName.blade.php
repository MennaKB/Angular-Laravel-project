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

        .img_size{
            width: 250px;
            height: 250px;
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
                    <h2 class="h2_font" >Search with Product Name </h2>

                    <form action="{{route('product.SearchByName')}}" method="GET">
                        @csrf
                        <input type="text" name="pname" placeholder="Product Name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Search" >
                    </form>
                </div>

                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($product)
                        @foreach($product as $product)
                        <tr>

                            {{-- <td>{{$product['title']}}</td> --}}
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
                                    @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Do you want to Delete this Category?')" >Delete</button>
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
