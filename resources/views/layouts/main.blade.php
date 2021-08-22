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
                            <li class="breadcrumb-item active">Главная</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                    <div class="card-body">
                        <form class="form-inline ml-3" method="get" action="{{ route('welcome') }}">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="q" placeholder="Search" aria-label="Search">

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Искать</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->


                </form>
            </div>


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Все продукты</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach($products as $product)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ $product->image_url }}" alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('detail', $product->id) }}" class="product-title">
                                        {{ $product->title }}
                                        <span class="badge badge-warning float-right">{{ $product->price }}</span>
                                    </a>
                                    <span class="product-description">{{ $product->description }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>


                </div>
            </div>

        </section>
    </div>

@endsection
