@extends('layout')

@section('title','Trang tìm kiếm')

@section('content') 
<hr>
  <div class="col">
            <form class="d-flex" role="search" action="search">
                <input class="form-control" list="datalistOptions" name="search" id="exampleDataList" placeholder="Nhập để tìm...">
                    <datalist id="datalistOptions">
                        @foreach ($books as $book)
                        <option value="{{ $book->title }}">
                        @endforeach
                    </datalist>
                <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
  </div>
<hr class="border border-secondary border-3 opacity-75">  
    <h2>Đã tìm thấy <b>{{$count}}</b> sản phẩm tương ứng với từ khóa "<b>{{$search}}</b>"</h2>
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
    {{ $books->links() }}
@endsection
