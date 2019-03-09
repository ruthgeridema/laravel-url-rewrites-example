@extends('layout')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <h1 class="my-4">{{ $category->name }}</h1>
                <div class="row">
                    @foreach($category->products as $product)
                        @include('catalog.product_list', ['product' => $product])
                    @endforeach
                </div>

            </div>
            <!-- /.col-lg-3 -->
        </div>
        <!-- /.row -->

    </div>
@endsection
