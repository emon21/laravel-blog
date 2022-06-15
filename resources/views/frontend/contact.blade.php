@extends('frontend.layouts.master')
@section('title', 'Contact')

@section('content')


    <div class="site-wrap">

        <div class="site-cover site-cover-sm same-height overlay single-page"
            style="background-image: url('{{ asset('frontend') }}/images/img_4.jpg');">
            <div class="container">
                <div class="row same-height justify-content-center">
                    <div class="col-md-12 col-lg-10">
                        <div class="post-entry text-center">
                            <h1 class="">Contact Us</h1>
                            <p class="lead mb-4 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Dolorem, adipisci?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="site-section bg-light">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-7 mb-5">

                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}



                        <form action="{{ route('send_message') }}" class="p-5 bg-white" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="name">Full Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="email">Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Subject</label>
                                    <input type="subject" name="subject" value="{{ old('subject') }}"
                                        class="form-control @error('subject') is-invalid @enderror">
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="message">Message</label>
                                    <textarea name="message" value="{{ old('message') }}" cols="30" rows="7"
                                        class="form-control @error('message') is-invalid @enderror" placeholder="Write your notes or questions here...">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="col-md-5">

                        <div class="p-4 mb-3 bg-white">
                            <p class="mb-0 font-weight-bold">Address</p>
                            <p class="mb-4">{{ $setting->address }}</p>
                            <p class="mb-0 font-weight-bold">Phone</p>
                            <p class="mb-4"><a href="#">{{ $setting->phone_no }}</a></p>
                            <p class="mb-0 font-weight-bold">Email Address</p>
                            <p class="mb-0"><a href="#">{{ $setting->email }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
