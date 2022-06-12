@extends('frontend.layouts.master')
@section('title', 'Category')
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Category</span>
                    <h3>Sports</h3>
                    <p>Category description here.. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam error
                        eius quo, officiis non maxime quos reiciendis perferendis doloremque maiores!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($categoryList as $list)
                    <div class="col-md-4 order-md-2">
                        <a href="{{ route('website.post', ['slug' => $list->slug]) }}" class="hentry img-1"
                            style="background-image: url('{{ $list->image_url }}');height: 260px;margin-bottom: 20px;text-align: center;">
                            <span class="post-category text-white bg-danger"
                                style="margin-top: 110px;">{{ $list->category_name }}</span>
                            <div class="text-center text-white">
                                <span>{{ $list->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    <div class="custom-pagination">
                        <span>1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <span>...</span>
                        <a href="#">15</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
