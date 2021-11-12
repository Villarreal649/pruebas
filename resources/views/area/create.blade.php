@extends('layouts.app')
@section('template_title')
    Crear Área
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Áreas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                @includeif('partials.errors')
                    <div class="card">
                    <div class="card-header">
                        <span class="card-title">Crear un área</span>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('areas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('area.form')

                        </form>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
