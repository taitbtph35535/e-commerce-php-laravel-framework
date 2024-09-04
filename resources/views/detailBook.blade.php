@extends('layout')

@section('title','Trang chủ')

@section('content')


@foreach ($book as $item)
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

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('book.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="http://localhost/lab6/public/List-Books-Follow-Categories/0">List Book</a></li>
    <li class="breadcrumb-item" aria-current="page"> <a href="http://localhost/lab6/public/List-Books-Follow-Categories/{{ $item->cate_id }}">{{ $item->cate_name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$item->title}}</li>
  </ol>
</nav>
    <div class="container pt-4 pb-4">
        <div class="row align-items-start">
            <div class="col">
            {{-- <img src="{{ $item->thumbnail }}" alt="" class="img-fluid">--}}
            <img src="{{ asset('/storage/' . $item->thumbnail) }}" width="100%" alt=""> 
            </div>
            <div class="col">
                <h1>{{$item->title}}</h1>
                <p><b>Author:</b> {{$item->author}}</p>
                <p><b>Publisher:</b> {{$item->publisher}}</p>
                <p><b>Publication:</b> {{$item->Publication}}</p>
                <p><b>Price:</b> {{$item->Price}} đ</p>
                <p><b>Category: </b>{{$item->cate_name}}</p>
                {{-- <p><b>Category: </b>{{$item->cate_id}}</p> --}}
                <form action="{{route('book.addToCart')}}" method="post">
                  @csrf
                 
                  @if(isset($arr_ctb_1))
                  <select name="attribute_1" id="">
                    @foreach($arr_ctb_1 as $item )
                    <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                  </select>
                  @endif
                  @if(isset($arr_ctb_2))
                  <select name="attribute_2" id="">
                    @foreach($arr_ctb_2 as $item )
                    <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                  </select>
                  @endif
                  <input type="number" placeholder="Nhập số lượng" name="Quantity">
                  <input type="hidden" placeholder="" name="book_id" value="{{$id_book}}">
                  <input type="hidden" placeholder="" name="id_user" value="{{Auth::user()->id}}">
                  <button type="submit">Mua ngay</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection