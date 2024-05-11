<div class="row mt-3 mb-3 p-3 border shadow">
    <h5>
        <i class="bi bi-newspaper"></i> Notícias
    </h5>
    @foreach ($news as $n)
    <div class="col-12">        
        <div class="card text-bg-primary p-1 mt-2 mb-2 text-center">
            <div class="card-body">
                <span><i class="bi bi-newspaper"></i> {{ $n }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>