@include('layouts.head')
    <div class="container d-flex justify-center align-items-center">
        <div class="card w-50 d-flex justify-center align-items-center gap-3">
            <h2 class="">Blogs</h2>
            <div class="flex flex-row justify-center align-items-center gap-3">
                <a class="btn btn-success" href="{{route('add_blog')}}">Create</a>
                <a class="btn btn-info" href="{{route('read_blogs')}}">Read</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
@include('layouts.footer')
