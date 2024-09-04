<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab 3: Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <body>
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
        <div class="container">
            <h1 style="text-align:center">Update Book<b>"{{$book->title}}"</b></h1>
            <hr>
            <form action="{{route('book.update',$book->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$book->id}}">
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title"  class="form-control" value="{{$book->title}}" placeholder="Nhập tên sách">
                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-2"><img src="{{ asset('/storage/' . $book->thumbnail) }}" width="95" alt=""></div>
                        <div class="col-10">
                            <label for="" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" value="{{$book->thumbnail}}" placeholder="Nhập tên thumbnail">
                            @error('thumbnail')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" value="{{$book->author}}" placeholder="Nhập tên Author">
                    @error('author')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Publisher</label>
                    <input type="text" name="publisher" class="form-control" value="{{$book->publisher}}" placeholder="Nhập tên Publisher">
                    @error('publisher')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Publication</label>
                    <input type="date" name="Publication" class="form-control" value="{{$book->Publication}}" placeholder="Nhập tên Publication">
                    @error('Publication')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" step="0.1" name="Price" class="form-control" value="{{$book->Price}}" placeholder="Nhập tên Price">
                    @error('Price')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" name="Quantity" class="form-control" value="{{$book->Quantity}}" placeholder="Nhập tên Quantity">
                    @error('Quantity')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category_name</label>
                    <select name="Category_id" class="form-control" id="">
                        @foreach ($categories as $cate)
                            <option value="{{$cate->id}}" @if ($cate->id === $book->Category_id) selected @endif>{{$cate->name}}</option>
                        @endforeach
                    </select>
                    @error('Category_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success p-2">Update Book</button>
                    <a href="{{route('book.index')}}" class="btn btn-secondary">List</a>
                </div>
            </form>
        </div>
  </body>
</html>