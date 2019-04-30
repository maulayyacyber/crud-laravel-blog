@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('post.update', $post) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Tulis Judul Artikel">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id  }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" placeholder="Tulis Konten Artikel" rows="5" class="form-control">{{ $post->content }}</textarea>
            </div>
            <div class="form-gourp">
                <button type="submit" class="btn btn-success btn-md">UPDATE</button>
            </div>
        </form>
    </div>
@endsection
