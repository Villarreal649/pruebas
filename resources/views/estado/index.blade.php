

@extends('layouts.app')

@section('template_title')
    Estado
@endsection


@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Estados</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            @can('crear-rol')

                            <div class="float-right ">
                                <a href="{{ route('estados.create') }}" class="btn btn-warning">
                                {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                            @endcan
                        <div class="table-responsive">
                        <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>No</th>

										<th>Estado</th>
										<th>Observaciones</th>
                                        <th>Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estados as $estado)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $estado->estado }}</td>
											<td>{{ $estado->observaciones }}</td>
                                            <td>
                                            @can('editar-estado]')
                                                        <a class="btn btn-sm btn-success mt-2" href="{{ route('estados.edit',$estado->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                                    @endcan

                                                    @can('borrar-estado')
                                                    <form action="{{ route('estados.destroy',$estado->id) }}" method="POST"style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="
                                                    return confirm('Estas seguro de que deseas borrar este estado?')" ><i class="fa fa-fw fa-trash"></i>Borrar</button>
                                                </form>
                                                    @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div class="pagination justify-content end">
                    {!! $estados ->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
