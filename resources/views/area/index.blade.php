@extends('layouts.app')

@section('template_title')
    Area
@endsection


@section('content')

    <section class="section">
        <div class="section-header">
        <form class="form-inline ml-3">
               
            </form>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="float-left">
                                <div class="head-text">Áreas</div>
                            </div>
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
                        <table class="table table-striped table-hover mt-2" id="areas">
                                <thead class="table-light">
                                <tr>
                                        <th>No.</th>

										<th>Nombre de área</th>
										<th>Se encuentra en la Planta</th>
										<th>Se encuentra en el edificio</th>
                                        <th>Acciones</th>

                                        
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
                                          
                                                    @can('editar-area')
                                                        <a class="btn btn-sm btn-success mt-2" href="{{ route('areas.edit',$area->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan

                                                    @can('borrar-area')
                                                    <form action="{{ route('areas.destroy',$area->id) }}" method="POST"style="display:inline">
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
                    {!! $areas ->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
