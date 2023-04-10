<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uodate paje</title>
</head>
<body>
    <h1>Update paje
    </h1>

    <form method="post" action="{{url('update',$data->id)}}"  enctype="multipart/form-data">
        @csrf

        <div>
            <label for="">Title</label>
            <input type="text" name="title" id="" value="{{$data->title}}">
        </div>
        <div>
            <label for="">Body</label>
            <input type="text" name="content_blog" id="" value="{{$data->content_blog}}">
        </div>
        <div>
            <label for="">Old Imaje</label>
            <img height="120" width="120" src="imajes/{{$data->image}}" alt="">
        </div>

        <div>
            <label for="">Change Image</label>
            <input type="file" name="file">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>

    </form>


</body>
</html>
