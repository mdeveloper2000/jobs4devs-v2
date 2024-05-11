@extends('layouts.base')
@include('partials.navbar')
@include('components.flash')

<div class="container">    
    <div class="row p-3 mt-5 mb-5 border shadow">
        <div class="col-12 text-center">
            <div class="text-bg-danger opacity-75 p-3">
                <h1>404 - Página não encontrada</h1>
                <h3 class="mt-3">A página não existe ou foi removida</h3>                
            </div>
        </div>
        <div class="col-12 text-center">
            <a class="btn btn-primary mt-5" href="/">
                <i class="bi bi-house-fill"></i> Retornar para a página inicial         
            </a>
        </div>
    </div>
</div>

@include('partials.footer')