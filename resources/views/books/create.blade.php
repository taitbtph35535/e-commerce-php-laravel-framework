<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lap 3: Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <body>
        <div class="container">
             <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{route('account.dashboard')}}">Home</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('account.list')}}">Account Management</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('book.index')}}">Book Management</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('category.index')}}">Category Management</a>
                      </li>
                      
                    </ul>
                  </div>
                </div>
                 @auth
        <div>
          <div class="row">
            <div class="col-3">
              <img src="{{ asset('/storage/' . Auth::user()->avatar) }}" width="100%" alt="">
            </div>
            <div class="col-7">
              Hello {{Auth::user()->role}}: {{Auth::user()->fullname}}
              <hr>
              <div class="row">
              
                <div class="col-8"><a href="{{route('user.detail')}}">Update Information</a></div>
              
                <div class="col-4"><a href="{{route('logout')}}">Logout</a></div>
              </div>
            </div>
            <div class="col-2">
                  <a href="{{route('book.home')}}">User Web</a>
            </div>
          </div>

        </div>
    @endauth
              </nav>
            <h1 style="text-align:center">Add new book</h1>
            <hr>
            <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title"  class="form-control" id="" placeholder="Nhập tên sách" value="{{old('title')}}">
                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control" id="" placeholder="Nhập tên thumbnail" value="{{old('title')}}">
                    @error('thumbnail')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" id="" placeholder="Nhập tên Author" value="{{old('title')}}">
                    @error('author')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Publisher</label>
                    <input type="text" name="publisher" class="form-control" id="" placeholder="Nhập tên Publisher" value="{{old('title')}}">
                    @error('publisher')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Publication</label>
                    <input type="date" name="Publication" class="form-control" id="" placeholder="Nhập tên Publication" value="{{old('title')}}">
                    @error('Publication')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number"  name="Price" class="form-control" id="" placeholder="Nhập tên Price" value="{{old('title')}}">
                    @error('Price')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" name="Quantity" class="form-control" id="" placeholder="Nhập tên Quantity" value="{{old('title')}}">
                    @error('Quantity')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category_name</label>
                    <select name="Category_id" class="form-control" id="">
                        @foreach ($categories as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                    @error('Category_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Add New </button>
                <a href="{{ route('book.index') }}" class="btn btn-secondary">List</a>  
            </div>
            </form>
        </div>
  </body>
</html>