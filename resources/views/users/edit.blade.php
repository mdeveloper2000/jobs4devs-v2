@extends('layouts.base')
@include('partials.navbar')
@include('components.flash')
@include('components.buttons')

<div class="container w-50 mt-5 mb-5 border p-3 shadow">    
    <div class="row">
        <form method="POST" action="/users/update" enctype="multipart/form-data">
            @csrf
            <h5 class="text-center mb-3 p-2 rounded text-bg-light border">Editar Usuário</h5>
            <div class="mb-3">
                <input type="hidden" name="id" value="{{$user->id}}" />
                <input type="text" class="form-control" name="name" placeholder="Nome" maxlength="50" value="{{$user->name}}" />
                @error('name')
                    <x-message :message="$message" />
                @enderror
            </div>                
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="E-mail" maxlength="50" value="{{$user->email}}" />
                @error('email')
                    <x-message :message="$message" />
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="phone" placeholder="Telefone" maxlength="15" value="{{$user->phone}}" />
                @error('phone')
                    <x-message :message="$message" />
                @enderror
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="button">Escolaridade</button>
                <select class="form-select" name="scholarity">
                    <option value=""></option>
                    <option {{$user->scholarity == 'Nível Fundamental' ? 'selected' : ''}}>Nível Fundamental</option>
                    <option {{$user->scholarity == 'Nível Médio' ? 'selected' : ''}}>Nível Médio</option>
                    <option {{$user->scholarity == 'Nível Superior' ? 'selected' : ''}}>Nível Superior</option>
                    <option {{$user->scholarity == 'Especialização' ? 'selected' : ''}}>Especialização</option>
                    <option {{$user->scholarity == 'Mestrado' ? 'selected' : ''}}>Mestrado</option>
                    <option {{$user->scholarity == 'Doutorado' ? 'selected' : ''}}>Doutorado</option>
                </select>
                @error('scholarity')
                    <x-message :message="$message" />
                @enderror
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="button">Foto</button>
                <input class="form-control" type="file" name="photo" />
                @if ($user->photo !== null)
                    <img width="40" height="40" src="{{ asset('storage/'. $user->photo) }}" />               
                @endif                
            </div>                  
            <div class="text-end">
                <button type="submit" class="btn btn-primary w-25">
                    <i class="bi bi-pencil-square"></i> Editar
                </button>
            </div>
        </form>
    </div>
</div>

@include('partials.footer')