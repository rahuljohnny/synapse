@extends('layouts.master')
@section('content')

    <div class="col-md-12">

        <section class="row new-post">
            <div class="col-md-6 col-md-offset-1">
                @include('partials.errors')

                <header><h3>Post it</h3></header>

                <form action="/posts" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="Your post">

                        </textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>


                </form>
            </div>
        </section>
        <hr>

        {{--Old Posts--}}

        <div class="row-posts">


            <div class="col-md-6 col-md-offset-1">
                    <h3>All Posts</h3>

                    @foreach($posts as $post)

                        <article class="posts">
                            <a href="posts/{{$post->id}}">
                                <h2 class="blog-post-title">{{$post->user->first_name}}</h2> {{--Each post has got an user--}}
                            </a>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>Posted by <a class="text-danger">{{$post->user->first_name}}</a> on {{$post->created_at}}</strong>
                                    </h3>
                                </div>

                                <div class="panel-body">
                                    <p><div class="text-success">{{$post->body}}</div>

                                </div>
                            </div>

                            <div class="expressions">

                                <a id="like" href="#" class="col-md-2">
                                    <i class="fa fa-thumbs-up fa-lg" aria-hidden="true" style="color: green"></i>
                                    <span class="badge">42</span>
                                </a>

                                <a id="dislike" href="#" class="col-md-2">
                                    <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                                    <span class="badge">42</span>
                                </a>

                                @if ($post->user->id == Auth::id())

                                    {{--Edit post--}}

                                    <a id="edit" href="#" class="col-md-2">
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: red"></i>
                                    </a>


                                    {{--Delete post--}}
                                    <a href="#" class="col-md-2">
                                        <div aria-hidden="true" onclick="del({{$post->id}})">
                                            <i class="fa fa-trash fa-lg" aria-hidden="true" style="color: red"></i>
                                        </div>
                                    </a>

                                    <script type="text/javascript">
                                        function del(id) {
                                            if(confirm("Delete?")){
                                                window.location.href = "/posts/"+id+"/delete/";
                                            }
                                        }
                                    </script>
                                    {{--Delete post--}}
                                @endif

                            </div>

                            <hr>
                            <br>

                        </article>

                    @endforeach

                    {{-- Modal --}}
                    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="post-body">Edit post</label>
                                            <textarea class="form-control" name="post-body" id="post-body" rows="5">

                                            </textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->



            </div>

            <div class="col-md-3 container pull-right" >

                <div class="row">
                    @include('includes.sidebar')
                </div><!-- /.row -->

            </div>

        </div>

        {{--Including footer--}}





    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    @include('includes.footer')

@endsection