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
    <h1 class="text-center pb-4">List of Account</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}    
        </div>
    @endif


    @auth
        <div>
            Admin : {{Auth::user()->fullname}}
            <a href="{{route('logout')}}">Logout</a>
        </div>
    @endauth
    <table class="table table-bordered mx-auto">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Avatar</th>
                <th scope="col">Role</th>
                <th scope="col">Active</th>
                <th scope="col">Disable</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->fullname }}</td>
                    {{-- <td>
                        <img src="{{ asset('/storage/' . $user->image) }}" width="50" alt="">
                    </td> --}}
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td><img src="{{ asset('/storage/' . $user->avatar) }}"  alt="" width="50%"></td>
                    
                    {{-- <td>{{ $user->avatar }}</td> --}}
                    <td>{{ $user->role }}</td>
                    <td>
                        @if ($user->active == 1)
                            Still Active
                        @else
                            Not Active
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('account.setAble', $user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="hidden" name="fullname" value="{{ $user->fullname }}">
                            <input type="hidden" name="username" value="{{ $user->username }}">
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <input type="hidden" name="password" value="{{ $user->password }}">
                            <input type="hidden" name="avatar" value="{{ $user->avatar }}">
                            <input type="hidden" name="role" value="{{ $user->role }}">
                            <input type="hidden" name="active" value="{{ $user->active }}">
                            @if ($user->id != Auth::user()->id)
                                @if ($user->active == 1)
                               <button type="submit" class="btn btn-danger" > Off</button> 
                               {{-- <button type="submit" class="btn btn-danger" onclick="return confirm('Sure???')">On</button>  --}}
                                @endif
                                @if ($user->active == 0)
                                <button type="submit" class="btn btn-success">On</button> 
                                {{-- <button type="submit" class="btn btn-success" onclick="return confirm('Sure???')">Off</button>  --}}
                                @endif
                            @else
                            You can't change your status
                            @endif
                            
                            
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    </div>
</body>

</html>
