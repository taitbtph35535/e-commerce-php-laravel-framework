
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lap 3: List</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    {{-- <div class="container"> --}}

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
        <div class="row pb-4 pt-2">
          <div class="col text-center"><h1>List of Book</h1></div>
          <div class="col d-flex justify-content-end pt-3">    
                <a href="{{route('book.create')}}" class="btn btn-success">Create New</a>
          </div>
        </div>
    <table class="table table-bordered table-striped border ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Author</th>
      <th scope="col">Publisher</th>
      <th scope="col">Publication</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category Name</th>
      <th scope="col">Active</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($books as $book)
        <tr>
            <th scope="row">{{$book->id}}</th>
            <td>{{$book->title}}</td>
            <td>
                <img src="{{ asset('/storage/' . $book->thumbnail) }}" width="50" alt="">
            </td>
            {{-- <td width="10px">{{$book->thumbnail}}</td> --}}
            <td>{{$book->author}}</td>
            <td>{{$book->publisher}}</td>
            <td>{{$book->Publication}}</td>
            <td>{{$book->Price}}</td>
            <td>{{$book->Quantity}}</td>
            <td>{{$book->category->name }}</td>
<td>
    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-success">Edit</a>
    <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: inline-block;">  @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa {{$book->title}} (Mã: {{$book->id}}) không???')">Delete</button>
    </form>
</td>
        </tr>
    @endforeach
  </tbody>
</table>
    <div class="t">
        {{ $books->links() }}
    </div>
</div>
   {{-- </div> --}}
     
  </body>

</html>