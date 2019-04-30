@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-sm btn-success" href="{{ route('post.create') }}">TAMBAH</a>
                @foreach ($posts as $post)
                    <div class="card" style="margin-top: 10px">

                        <div class="card-header">
                            <div class="text-right">
                                <form action="{{ route('post.destroy', $post) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-sm btn-primary" href="{{ route('post.edit', $post) }}">EDIT</a>
                                    <button type="submit" class="btn btn-sm btn-danger" href="">HAPUS ?</button>
                                </form>

                            </div>
                            {{ $post->title }}
                        </div>

                        <div class="card-body">

                            {{ $post->content }}
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
