@extends('frontend.layouts.master')
@section('title', 'Tag List')
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span></span>
                    <h2>All Tag</h2>
                    <h4>Total Tag : {{ $taglist->count() }}</h4>
                    <p class="bold">Total Posts : </p>
                    <p>All Skills of Post List into Tag</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($taglist as $list)
                    <div class="col-md-4 order-md-2 border-1">
                        <a href="{{ route('website.tag', $list->slug) }}" class="hentry img-1">
                            <span class="post-category text-white bg-danger"
                                style="margin-top: 110px;">{{ $list->tag_name }} ( {{ $list->posts_count }}
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
