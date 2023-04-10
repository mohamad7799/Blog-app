@extends('layout')

@section('title')
    create blog form
@endsection

@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-8 col-md-offset-8">



            <form method="post" action="{{route('store_data')}}" enctype="multipart/form-data" >

                @csrf
                <h1>post</h1>
                <hr>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"  placeholder="Enter the title">

                    @error('title')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control  @error('content_blog') is-invalid @enderror" name="content_blog" placeholder="Enter the body"></textarea>

                    @error('content_blog')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                @if(@session('success'))
                <div class="alert alert-primary" role="alert">
                    <h2 class="alert-heading ">{{session('success')}}</h2>
                </div>
                @endif

                <div class="form-group">
                    <label>Uploud</label>
                    <input type="file" height="120" width="120" class="form-control" name="file">
                </div>

                <button type="submit" class="btn btn-success btn-lg btn-block ">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
