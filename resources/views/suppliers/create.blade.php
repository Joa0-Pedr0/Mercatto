<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Novo Fornecedor</title>
</head>
<body class="bg-gray-100 p-6">

<h1 class="text-3xl font-bold mb-6">Cadastrar Fornecedor</h1>


<form action="{{ route('suppliers.store') }}" method="POST"
      class="bg-white p-6 shadow rounded w-96 space-y-3">
    @csrf

    <label class="block">
        Nome do fornecedor:
        <input type="text" name="name" class="w-full border p-2 rounded">
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
    </label>

    <label class="block">
        CNPJ:
        <input type="number" name="cnpj" class="w-full border p-2 rounded">
            @error('cnpj')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
    </label>

    <label class="block">
        Produtos oferecidos:
        <input type="text" name="products" class="w-full border p-2 rounded">
            @error('products')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
    </label>

    <div class="flex items-center gap-3">
        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Salvar</button>
        <a href="{{ route('suppliers.index') }}" class="text-blue-600 hover:underline">Voltar</a>
    </div>
</form>

</body>
</html>