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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <a href="{{url('/show_product')}}" class="btn btn-success">Show Product</a>
            </div>
        @else
        <a href="{{url('/show_product')}}" class="btn btn-success">Show Product</a>

        @endif
    </center> 
   <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Update Product</h1>
                <form action="{{url('/edit_product',$data->id)}}" method="Post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Product title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5">{{$data->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Current Image</label>
                        <img src="/product/{{$data->image}}" height="50px" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Change Product image</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
