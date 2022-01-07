@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro de Produtos</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="btn btn-success" href='{{ route("products.create") }}'><i class="fa fa-plus"></i>Cadastrar Produto</a></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Preço
                                </th>
                                <th width="5%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>
                                    {{ $product->title ?? 'N/A' }}
                                </td>

                                <td>
                                    {{$product->price}}
                                </td>

                                <td>
                                    <a class="btn btn-success d-block mb-2" href='{{ route("products.edit", $product->id) }}'><i class="fa fa-pencil"></i> Editar</a>

                                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <i class="fa fa-times"></i>
                                            <input type="submit" class="btn btn-danger d-block" value="Deletar">
                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" align="center">Nenhum produto encontrado</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection