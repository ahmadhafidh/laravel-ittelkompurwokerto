@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Waktu</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-folder"></i> Edit Waktu</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.waktu.update', $waktu->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>HARI</label>
                                <input type="text" name="hari" value="{{ old('hari', $waktu->hari) }}" placeholder="Masukkan hari" class="form-control @error('hari') is-invalid @enderror">

                                @error('hari')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror

                                <label>JAM</label>
                                <input type="text" name="jam" value="{{ old('jam', $waktu->jam) }}" placeholder="Masukkan jam" class="form-control @error('jam') is-invalid @enderror">

                                @error('jam')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop