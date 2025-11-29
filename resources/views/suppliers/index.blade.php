<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Fornecedores</title>
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-3xl font-bold mb-6">Fornecedores</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex gap-3">
        <a href="{{ route('suppliers.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Novo Fornecedor</a>
        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Categorias</a>
        <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Clientes</a>
        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Produtos</a>
        <a href="{{ route('sales.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Vendas</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
    @csrf
    <button type="submit" 
        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition duration-150 ease-in-out">
        Deslogar
    </button>
        </form>

    </div>

    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Nome</th>
                <th class="p-3">CNPJ</th>
                <th class="p-3">Produtos oferecidos</th>
                <th class="p-3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse($suppliers as $supplier)
            <tr class="border-t">
                <td class="p-3">{{ $supplier->id }}</td>
                <td class="p-3">{{ $supplier->name }}</td>
                <td class="p-3">{{ $supplier->cnpj }}</td>
                <td class="p-3">{{$supplier->products}}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-blue-600 hover:underline">Editar</a>

                    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="inline" onsubmit="return confirm('Deseja excluir este fornecedor?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="p-6 text-center text-gray-500">Nenhum fornecedor cadastrado.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</body>
</html>