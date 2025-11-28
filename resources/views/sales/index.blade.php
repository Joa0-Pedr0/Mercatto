<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Vendas</title>
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-3xl font-bold mb-6">Vendas</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex gap-3">
        <a href="{{ route('sales.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Nova Venda</a>
        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Categorias</a>
        <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Clientes</a>
        <a href="{{ route('suppliers.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Fornecedores</a>
        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Produtos</a>

    </div>

    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Cliente</th>
                <th class="p-3">Produto</th>
                <th class="p-3">Forma de pag</th>
                <th class="p-3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse($sales as $sale)
            <tr class="border-t">
                <td class="p-3">{{ $sale->id }}</td>
                <td class="p-3">{{ $sale->customer->name }}</td>
                <td class="p-3">{{ $sale->product->name}}</td>
                <td class="p-3">{{ $sale->payment }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('sales.edit', $sale->id) }}" class="text-blue-600 hover:underline">Editar</a>

                    <form action="{{ route('sales.destroy', $sale) }}" method="POST" class="inline" onsubmit="return confirm('Deseja excluir esta venda?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="p-6 text-center text-gray-500">Nenhuma venda cadastrada.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</body>
</html>