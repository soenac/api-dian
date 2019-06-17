<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- Fonts --}}
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Ambientes</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\TypeEnvironment::all() as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Tipos de identificaciones</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\TypeDocumentIdentification::all() as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Organizaciones</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\TypeOrganization::all() as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Regimenes</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\TypeRegime::all() as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Responsabilidades</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\TypeLiability::all() as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Municipios</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Municipality::all() as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Descripción</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\TypeCurrency::all() as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Paises</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Country::all() as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>