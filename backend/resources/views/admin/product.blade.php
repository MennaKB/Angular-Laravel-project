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
                    <h2 class="h2_font" >Add Product</h2>

                    <form action="{{route('product.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="">Product Title: </label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="title" placeholder="Write Title" required>
                            </div>
                        </div>

                        <div class="mb-3 row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="">Product Description</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="description" placeholder="Write Description" required>
                            </div>
                        </div>
                        <div class="mb-3 row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="">Product Price</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" name="price" min="0" placeholder="Enter Price"required>
                            </div>
                        </div>
                        <div class="mb-3 row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="">Product Quantity</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" name="quantity" min="0" placeholder="Enter Quantity" required>
                            </div>
                        </div>
                        <div class="mb-3 row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="">Product Category</label>
                            </div>
                            <div class="col-auto">
                                <select name="category" class="" name="category" required>
                                    <option value="" selected="">Add a Category</option>
                                    @foreach($category as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="">Product Image</label>
                            </div>
                            <div class="col-auto">
                                <input type="file" name="image" required>
                            </div>
                        </div>

                        <div class="mb-3 row g-1 align-items-center">
                            <div class="col-4">
                                <input type="submit" class="btn btn-primary" value="Add Product" >
                            </div>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
