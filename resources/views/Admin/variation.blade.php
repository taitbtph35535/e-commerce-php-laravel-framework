<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container-fluid">
    <h1 class="text-center pb-4">List of variations</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}    
        </div>
    @endif
    <table class="table table-bordered mx-auto">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Book's Name</th>
                <th scope="col">variation_1</th>
                <th scope="col">variation_2</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($variations as $variation)
            <tr>
                <td>{{$variation->id}}</td>
                <td>{{$variation->book_id}}</td>
                <td>{{$variation->attribute_1}}</td>
                <td>{{$variation->attribute_2}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $users->links() }} --}}
    </div>
</body>

</html>
