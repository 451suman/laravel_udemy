<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<center>
    {{-- <a href="{{route('show_product')}}"  class="btn btn-success">showproduct</a> --}}
    <a href="{{url('/show_product')}}"  class="btn btn-success">show product</a>
</center> 
   <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Add Product</h1>

                <ul style="background-color: #ff000023">
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <li style="color: #ff0000">
                                {{$error}}
                            </li>
                        @endforeach
                    @endif
                </ul>
                

                <form action="{{url('/add_product')}}" method="Post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Product title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Product image</label>
                        <input type="file" class="form-control" id="image" name="image" >
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
