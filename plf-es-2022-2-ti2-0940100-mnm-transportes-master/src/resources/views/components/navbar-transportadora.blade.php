<nav class="w-full bg-white z-30 absolute top-0 shadow-md flex justify-between items-center py-2 px-5 h-16">
    <div>
        <a href="/painel">
            <img class="w-28" src="{{ asset('img/Logo.png') }}" alt="logo">
        </a>
    </div>

    <div class="flex gap-10 justify-center items-center">
        <a href="{{ route('visualizar.funcionarios') }}" class="uppercase text-xs border rounded-full px-10 py-2 border-blue-400 bg-blue-400 text-white font-semibold">Funcionários</a>

        <div>
            <a href="/sair" class="text-sm cursor-pointer hover:underline">Sair</a>
        </div>
    </div>
</nav>
