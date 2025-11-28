<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Clientes</title>
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-3xl font-bold mb-6">Clientes</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-500 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex gap-3">
        <a href="{{ route('customers.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Novo Cliente<a>
        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Categorias</a>
        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Produtos</a>
        <a href="{{ route('suppliers.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Fornecedores</a>
    </div>

    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Nome</th>
                <th class="p-3">CPF</th>
                <th class="p-3">Endereço</th>
                <th class="p-3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse($customers as $customer)
            <tr class="border-t">
                <td class="p-3">{{ $customer->id }}</td>
                <td class="p-3">{{ $customer->name }}</td>
                <td class="p-3">{{ $customer->cpf }}</td>
                <td class="p-3">{{ $customer->address }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('customers.edit', $customer->id) }}" class="text-blue-600 hover:underline">Editar</a>

                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline" onsubmit="return confirm('Deseja excluir este cliente?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="p-6 text-center text-gray-500">Nenhum cliente cadastrado.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</body>
</html>