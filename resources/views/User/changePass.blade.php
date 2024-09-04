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

            @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
                @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
    <a href="{{route('user.detail')}}" class="btn btn-secondary">Detail</a>
    <form action="{{ route('user.changePass',$user) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                    <div class="col-11">
                        <input class="form-control" type="hidden" name="avatar" id="fileImage">
                    </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" name="fullname" value="{{$user->fullname}}">
            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" name="username" value="{{$user->username}}">
            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" name="email" value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <input disabled type="hidden" class="form-control" name="role" value="{{$user->role}}">
            </div>
            <div class="mb-3">
                <input disabled type="hidden" class="form-control" name="active" value="@if ($user->active == 1)
Still Active
                        @else
Not Active
                        @endif">
            </div>
            <div class="mb-3">
                <h1 class="text-center">Change Pass for {{Auth::user()->fullname}}</h1>
            <div class="mb-3">
                <label class="form-label">Old Password</label>
                <input type="password" class="form-control" name="oldPassword" >
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" >
            </div>
            <div class="mb-3">
                <label class="form-label">Repassword</label>
                <input type="password" class="form-control" name="rePassword" >
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Change Now</button>
            </div>
    </div>
    </form>
</body>
</html>