@extends('layouts.app')

@section('template_title')
    Area
@endsection


@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Áreas</h3>
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

                            <div class="float-right">
                                <a href="{{ route('areas.create') }}" class="btn btn-warning">
                                  {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                            @endcan
                        <div class="table-responsive">
                        <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>No.</th>

										<th>Nombre de área</th>
										<th>Se encuentra en la Planta</th>
										<th>Se encuentra en el edificio</th>
                                        <th>Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($areas as $area)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $area->name }}</td>
											<td>{{ $area->planta->name }}</td>
											<td>{{ $area->edificio->name }}</td>

                                            <td>
                                            @can('editar-area]')
                                                        <a class="btn btn-sm btn-success mt-2" href="{{ route('areas.edit',$area->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @endcan

                                                    @can('borrar-area')
                                                    <form action="{{ route('areas.destroy',$area->id) }}" method="POST"style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="
                                                    return confirm('Estas seguro de que deseas borrar esta área?')" ><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                                    @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div class="pagination justify-content end">
                    {!! $areas ->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
