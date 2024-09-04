@extends('layout')

@section('title','Trang chủ')

@section('content')
    {{-- <header>
        <div class="p-3 text-center">
        <h1>ASM môn Lập trình PHP 3(WEB401)</h1>
        </div>
    </header> --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('book.home')}}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="http://localhost/lab6/public/List-Books-Follow-Categories/0">List Of Book</a>
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
              @if (Auth::user()->role == 'admin')
                  <a href="{{route('account.list')}}">Admin Web</a>
              @endif
              
            </div>
          </div>

        </div>
    @endauth
    </nav>
    
<div class="row pt-5">
  <div class="col"><h1>Home</h1></div>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('book.home')}}">Home</a></li>
  </ol>
</nav>
  <div class="col">
            <form class="d-flex" role="search" action="search">
                <input class="form-control" list="datalistOptions" name="search" id="exampleDataList" placeholder="Nhập để tìm...">
                    {{-- <datalist id="datalistOptions">
                        @foreach ($books as $book)
                        <option value="{{ $book->title }}">
                        @endforeach
                    </datalist> --}}
                <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
  </div>
</div>
    
<hr>
<div class="alert alert-primary" role="alert">
<h2>8 sản phẩm có giá cao nhất</h2>
</div>

<div class="container text-center ">
  <div class="row align-items-start pt-5">
    @foreach ($booksHighestPrice as $book)
        <div class="col-4 ">
                        <img src="{{ asset('/storage/' . $book->thumbnail) }}" width="300px" height="300px" alt=""> 

            <a href="http://localhost/lab6/public/detail-book/{{$book->id}}">
                <h3>{{ $book->title }}</h3> 
            </a>
            <p>{{ $book->Price }} đ</p>
            <p>{{ $book->author }}{{ $book->publisher }}</p>
        </div>
    @endforeach
  </div>
</div>
    
<div class="alert alert-primary" role="alert">
<h2>8 sản phẩm có giá thấp nhất</h2>
</div>
<div class="container text-center ">
  <div class="row align-items-start pt-5">
    @foreach ($booksLowestPrice as $book)
        <div class="col-4 ">
            <img src="{{ asset('/storage/' . $book->thumbnail) }}" width="300px" height="300px" alt=""> 
            <a href="http://asm.test/detail-book/{{$book->id}}">
                <h3>{{ $book->title }}</h3> 
            </a>
            <p>{{ $book->Price }} đ</p>
            <p>{{ $book->author }}{{ $book->publisher }}</p>
        </div>
    @endforeach
  </div>
</div>

@endsection
