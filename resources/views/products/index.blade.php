<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Produtos</title>
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-3xl font-bold mb-6">Estoque</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex gap-3">
        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Novo Produto</a>
        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Categorias</a>
        <a href="{{ route('suppliers.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Fornecedores</a>

    </div>

    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Nome</th>
                <th class="p-3">Qtd</th>
                <th class="p-3">Preço</th>
                <th class="p-3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $p)
            <tr class="border-t">
                <td class="p-3">{{ $p->id }}</td>
                <td class="p-3">{{ $p->name }}</td>
                <td class="p-3">{{ $p->amount }}</td>
                <td class="p-3">R$ {{$p->price}}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('products.edit', $p->id) }}" class="text-blue-600 hover:underline">Editar</a>

                    <form action="{{ route('products.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Deseja excluir este produto?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="p-6 text-center text-gray-500">Nenhum produto cadastrado.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</body>
</html>