@extends('layout')

@section('title')
    show data
@endsection

@section('content')

<h1>display data from database</h1>

<br>

<form align="center" action="{{route('search-data')}}">
    <input type="search" name="search" placeholder="Search For Something ">
    <input type="submit" value="search">
</form>

<br>

<table class="table  table-sm text-center ">
    <tr >
        <th>Id</th>
        <th>Title</th>
        <th>Body</th>
        <th>Image</th>
        <th>Delete</th>
        <th>Update</th>

    </tr>

    @foreach ($data as $info)

    <tr>
        <td>{{$info->id}}</td>
        <td>{{$info->title}}</td>
        <td>{{$info->content_blog}}</td>
        <td><img height="150px" width="150px" src="images/{{$info->image}}" ></td>
        <td align="center"><a href="{{url('delete',$info->id)}}">Delete</a></td>
        <td align="center"><a href="{{url('update_paje',$info->id)}}">Update</a></td>

    </tr>

    {{-- <tr>
        <a href="{{url('delete',$info->id)}}">Delete</a>
    </tr> --}}

    @endforeach

</table>
@endsection
