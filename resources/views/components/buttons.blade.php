<div class="text-bg-primary bg-opacity-75 p-4 w-100 text-end">
    @auth
        <span>
            @if (auth()->user()->photo !== null)
                <img class="rounded-circle border border-light" width="50" height="50" src="{{ asset('storage/'. auth()->user()->photo) }}" />    
            @else
                <i class="bi bi-person-circle fs-1"></i>                
            @endif            
        </span>
        <span class="pe-5 fw-bold fs-5">
            Olá, {{auth()->user()->name}}
        </span>
        <a class="btn btn-warning" href="/users/settings">
            <i class="bi bi-gear-fill"></i> Configurações
        </a>
        <form method="post" action="/users/logout" style="display: inline;">
            @csrf
            <button class="btn btn-danger" type="submit">
                <i class="bi bi-door-open-fill"></i> Sair
            </button>
        </form>
    @else
        <i class="bi bi-person-circle fs-1"></i>
        <span class="pe-5 fw-bold">&nbsp;Olá, visitante</span>
        <a class="btn btn-success" href="/users/login" style="min-width: 150px;">
            <i class="bi bi-person-check-fill"></i> Login
        </a>
        <a class="btn btn-warning" href="/users/create" style="min-width: 150px;">
            <i class="bi bi-person-fill-add"></i> Registrar
        </a>
    @endauth    
</div>