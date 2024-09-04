@extends('layout')

@section('title','Trang danh sách sản phẩm')

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
<hr class="border border-secondary border-3 opacity-75">  

<ul class=" nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/lab6/public/List-Books-Follow-Categories/0">All</a>
        </li>
    @foreach ($categories as $categorie)
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/lab6/public/List-Books-Follow-Categories/{{ $categorie->id }}">{{ $categorie->name }}</a>
        </li>   
         
    @endforeach

</ul>
<hr class="border border-secondary border-3 opacity-75">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('book.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="http://localhost/lab6/public/List-Books-Follow-Categories/0">List Book</a></li>
    {{-- <li class="breadcrumb-item" aria-current="page"> <a href="http://localhost/lab6/public/List-Books-Follow-Categories/{{ $item->cate_id }}">{{ $item->cate_name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$item->title}}</li> --}}
  </ol>
</nav>
<div class="row">
    <div class="col-8">
        @if (isset($books))
        @if ($id != 0)
            <h2>Đây là danh sách sản phẩm "<b>{{ $books->first()->cate_name }}</b>"</h2>
        @else
            <h2>Đây là danh sách tất cả sản phẩm</h2>
        @endif
    </div>
    <div class="col-4">
        
    </div>
</div>

    
<div class="container text-center ">
    
  <div class="row align-items-start pt-5">
    @foreach ($books as $book)
        <div class="col-4 ">
            {{-- <img src="{{ $book->thumbnail }}" alt="" class="img-fluid"> --}}
            <img src="{{ asset('/storage/' . $book->thumbnail) }}" width="300px" height="300px" alt=""> 

            <a href="http://localhost/lab6/public/detail-book/{{$book->id}}">   
                <h3>{{ $book->title }}</h3> 
            </a>
            <p>{{ $book->Price }}</p>
            <p>{{ $book->author }}{{ $book->publisher }}</p>
        </div>
    @endforeach
  </div>
</div>
    
@else
    <h2 class="text-center pt-5 pb-5">Không có sản phẩm nào trong dành mục này</h2>

    
@endif
@if (isset($books))
    {{ $books->links() }}
@endif


@endsection
