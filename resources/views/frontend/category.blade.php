@extends('frontend.layouts.master')
@section('title', 'Category')
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span></span>
                    <h2>All Category</h2>
                    <h4>Category : {{ $categoryList->count() }}</h4>
                    <p class="bold">Total Posts : {{ $posts->count() }}</p>
                    <p>All Skills of Post List into Category</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($categoryList as $list)
                    <div class="col-md-4 order-md-2">
                        <a href="{{ route('singleCategory', $list->slug) }}" class="hentry img-1"
                            style="background-image: url('{{ $list->image_url }}');height: 260px;margin-bottom: 20px;text-align: center;">
                            <span class="post-category text-white bg-danger"
                                style="margin-top: 110px;">{{ $list->category_name }} ( {{ $list->posts_count }}
                                )</span>
                            <div class="text-center text-white">
                                <span>{{ $list->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
