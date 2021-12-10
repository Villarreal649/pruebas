@extends('layouts.app')

@section('template_title')
    Resguardos
@endsection


@section('content')

    <section class="section">
        <div class="section-header">
        <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input name="buscarporresguardo" type="text" placeholder="Nombre solicitante" class="form-control"
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
                                <div class="head-text">Reguardos</div>
                            </div>

                        @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                            @can('crear-rol')

                            <div class="float-right">
                                <a href="{{ route('resguardos.create') }}" class="btn btn-warning">
                                {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                            @endcan
                        <div class="table-responsive">
                        <table class="table table-striped table-hover mt-2" id="resguardos">
                                <thead class="table-light">
                                <tr>
                                        <th>No</th>

										<th>Nombre Solicitante</th>
										<th>No. Telefónico</th>
										<th>Email</th>
										<th>Fecha Resguardo</th>
										<th>Matrícula</th>
										<th>Fecha Devolución</th>
										<th>Observaciones</th>
										<th>Encargado</th>
										<th>Area Resguardo</th>
                                        <th>Acciones</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resguardos as $resguardo)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $resguardo->nombre_solicitante }}</td>
											<td>{{ $resguardo->number }}</td>
											<td>{{ $resguardo->email }}</td>
											<td>{{ $resguardo->fecha_resguardo }}</td>
											<td>{{ $resguardo->matricula }}</td>
											<td>{{ $resguardo->fecha_dev }}</td>
											<td>{{ $resguardo->observaciones }}</td>
											<td>{{ $resguardo->user->name }}</td>
											<td>{{ $resguardo->area->name }}</td>

                                            <td>
                                            @can('editar-resguardo')
                                                        <a class="btn btn-sm btn-success mt-2" href="{{ route('resguardos.edit',$resguardo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan

                                                    @can('borrar-resguardo')
                                                    <form action="{{ route('resguardos.destroy',$resguardo->id) }}" method="POST"style="display:inline">
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
                    {!! $resguardos ->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
