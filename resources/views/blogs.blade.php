@include('layouts.head')
    <a href="{{route('dashboard')}}">Back</a>

    <div class="d-flex justify-content-center align-content-center">
        <form class="card w-50 p-3" action="{{route('add_blog_process')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <input type="text" class="form-control" id="content" name="content" placeholder="Enter Content">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" id="image_path" name="image_path" placeholder="Enter Image">
            </div>
            <button class="m-5 btn btn-primary" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@include('layouts.footer')
