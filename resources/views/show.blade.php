<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>AbcAge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-4 mx-auto text-center">
            <h2 class="mb-2">Выберите дату</h2>
            <form action="{{ route('product.show') }}" method="post">
                @csrf
                <input type="date" value="2021-01-13" name="date" class="form-control mb-3"/>
                <button class="w-100 btn btn-primary btn-lg" type="submit">Применить</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-7 mx-auto text-center">
            <div class="list-group w-auto">
                <div>{{ $date }}</div>
                <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
                    <div class="gap-2 w-100">
                        @foreach($supplies as $supply)
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h6 class="mb-2">Остатки с поставки:</h6>
                                    <p class="mb-0 opacity-75">{{ $supply->number }}</p>
                                </div>
                                <div class="col-4">
                                    <h6 class="mb-2">Кол-во:</h6>
                                    <p class="mb-0 opacity-75">{{ $supply->count - $supply->count_ship }}</p>
                                </div>
                                <div class="col-4">
                                    <h6 class="mb-2">Цена за шт:</h6>
                                    <p class="mb-0 opacity-75">{{ $supply->price / $supply->count }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div class="mx-auto">
                            <h6 class="mb-2">Текущая цена:</h6>
                            <p class="mb-0 opacity-75">@if($price){{ $price }}@elseНет достаточного количества@endif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
