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

                        <article class="posts" data-postid="{{$post->id}}">

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>Posted by <a class="text-danger">{{$post->user->first_name}}</a> on {{$post->created_at}}</strong>
                                    </h3>
                                </div>

                                <div class="panel-body">
                                    <div class="text-success">{{$post->body}}</div>

                                </div>
                            </div>

                            <div class="expressions">
                                <div id="like" class="col-md-2"> {{--index 1--}}
                                    <a href="#">
                                        <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <span class="badge">42</span>
                                </div>

                                <div id="dislike" class="col-md-2"> {{--index 2--}}
                                    <a href="#">
                                        <i class="fa fa-thumbs-down fa-lg" aria-hidden="true" href="#"></i>
                                    </a>
                                    <span class="badge">42</span>{{--index 3--}}
                                </div>

                                @if ($post->user->id == Auth::id())
                                    {{--Edit post--}}

                                    <div class="col-md-2"> {{--index --}}
                                        <a href="#">
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: red" id="edit"></i>
                                        </a>
                                    </div>


                                    {{--Delete post--}}
                                    <div class="col-md-2">
                                        <div aria-hidden="true">
                                            <a href="#">
                                                <i class="fa fa-trash fa-lg" aria-hidden="true" style="color: red" onclick="del({{$post->id}})"></i>
                                            </a>
                                        </div>
                                    </div>

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

                            <br><br><hr><br>

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
                                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->



            </div>

            <div class="col-md-3 col-lg-3 container pull-right" >

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
    <script>
        var token = '{{csrf_token()}}';
        var urlNew = '{{route('edit')}}';


    </script>

@endsection