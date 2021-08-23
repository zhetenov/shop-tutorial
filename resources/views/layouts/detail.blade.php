@extends('welcome')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Главная</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Уй</a></li>
                            <li class="breadcrumb-item active">Детальная страница</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    <section class="content">

        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{ $product->title }}</h3>
                        <div class="col-12">
                            <img src="{{ $product->image_url }}" class="product-image" alt="Product Image">
                        </div>

                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $product->title }}</h3>
                        <p>{{ $product->description }}</p>



                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                {{ $product->price }}$
                            </h2>
                            <h4 class="mt-0">
                                <small>Ex Tax: {{ $product->price }}$ </small>
                            </h4>
                        </div>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Add to Cart
                            </div>

                            <div class="btn btn-default btn-lg btn-flat">
                                <i class="fas fa-heart fa-lg mr-2"></i>
                                Add to Wishlist
                            </div>

                            <form action="{{ route('addComment', ['product'=>$product->id]) }}" method="post">
                                @csrf
                                <div class="input-group mt-3">
                                    <input type="text" class="form-control" placeholder="Напишите коммент" name="comment">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="btn btn-default btn-lg btn-flat">
                                        <i class="fas fa-comments"></i>
                                        <button type="submit" class="btn btn-primary btn-block">Оставить</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        @foreach($comments as $comment)
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> {{ $comment->user->name }}</h5>
                                    {{ $comment->text }}
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>
@endsection
