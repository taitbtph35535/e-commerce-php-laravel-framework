<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm phim</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Home</a>
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
                        <a class="nav-link" href="#">Link</a>
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

            <div class="mb-3">
                <h1 class="text-center">Information of {{Auth::user()->fullname}}</h1>
                <label class="form-label">Avatar</label>
                    <div class="col-1">
                        <img id="img" src="{{asset('/storage/'.$user->avatar)}}" alt="" width="60">
                     </div>
            <div class="mb-3">
                <label for="" class="form-label">Full Name</label>
                <input disabled type="text" class="form-control" name="title" value="{{$user->fullname}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">User Name</label>
                <input disabled type="text" class="form-control" name="title" value="{{$user->username}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input disabled type="text" class="form-control" name="title" value="{{$user->email}}" required >
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Role</label>
                <input disabled type="text" class="form-control" name="title" value="{{$user->role}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Active</label>
                <input disabled type="text" class="form-control" name="title" value="@if ($user->active == 1)
Still Active
                        @else
Not Active
                        @endif">
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Image</label>
                <div class="row">
                    <div class="col-1">
                        <img id="img" src="{{asset('/storage/'.$post->image)}}" alt="" width="60">
                    </div>
                    <div class="col-11">
                        <input class="form-control" type="file" name="image" id="fileImage">
                    </div>
                </div>

 --}}
            <div class="mb-3">
                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('user.changePass', $user) }}" class="btn btn-primary">Change Pass</a>
            </div>
    </div>
</body>
</html>