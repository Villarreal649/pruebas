@extends('layouts.app')

@section('template_title')
    Categoria
@endsection


@section('content')

    <section class="section">
        <div class="section-header">
        <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input name="buscarporcategoria" type="search" placeholder="Nombre de la categoria..." class="form-control"
                    aria-label="Search"  >

                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="float-left">
                                <div class="head-text">Categorias</div>
                            </div>
                        @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            @can('crear-rol')

                            <div class="float-right">
                                <a href="{{ route('categorias.create') }}" class="btn btn-warning">
                                {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                            @endcan
                        <div class="table-responsive">
                        <table class="table table-striped table-hover mt-2" id="categorias">
                                <thead class="table-light">
                                <tr>
                                        <th>No</th>

										<th>Nombre categoría</th>
										<th>Descripción</th>
                                        <th>Acciones</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $categoria->name }}</td>
											<td>{{ $categoria->descripcion }}</td>
                                            <td>
                                            @can('editar-categoria')
                                                        <a class="btn btn-sm btn-success mt-2" href="{{ route('categorias.edit',$categoria->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan

                                                    @can('borrar-categoria')
                                                    <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST"style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="
                                                    return confirm('Are you sure that you want to delete this item?')" ><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                                    @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div class="pagination justify-content end">
                    {!! $categorias ->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
