@extends('layouts.app')


@section('content')

    <section class="section">
        <div class="section-header">
        <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input name="buscarporrol" type="search" placeholder="Nombre del rol..." class="form-control"
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
                                <div class="head-text">Roles</div>
                            </div>
                            @can('crear-rol')
                            <div class="float-right">
                                <a href="{{ route('roles.create') }}" class="btn btn-warning">
                                {{ __('Agregar ') }} <i class="fa fa-plus"></i>
                                </a>
                              </div>
                            @endcan

                        <div class="table-responsive">
                        <table class="table table-striped table-hover mt-2" id="roles">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
										<th>Rol</th>
										<th>Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{++$i}}</td>
											<td>{{ $role->name }}</td>
											<td>
                                            @can('editar-role')
                                                        <a class="btn btn-sm btn-success mt-2" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan

                                                    @can('borrar-role')
                                                    <form action="{{ route('roles.destroy',$role->id) }}" method="POST"style="display:inline">
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
                    {!! $roles ->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
