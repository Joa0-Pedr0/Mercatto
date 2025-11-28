<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Nova Venda</title>
</head>
<body class="bg-gray-100 p-6">

<h1 class="text-3xl font-bold mb-6">Cadastrar Venda</h1>

@if ($errors->any())
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('sales.store') }}" method="POST"
      class="bg-white p-6 shadow rounded w-96 space-y-3">
    @csrf


    <label class="block">
        Cliente:
        <select name="customer_id" class="w-full border p-2 rounded">
            <option value="">-- Selecione o Cliente --</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">
                    {{ $customer->name }}
                </option>
            @endforeach
        </select>
    </label>

        <label class="block">
            Produto:
            <select name="product_id" class="w-full border p-2 rounded">
                <option value="">-- Selecione o Produto --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <label class="block">
            Forma de Pagamento:
                <select name="payment" class="w-full border p-2 rounded">
                    <option value="">-- Selecione a Forma de Pagamento --</option>
                    <option value="pix">Pix</option>
                    <option value="money">Dinheiro</option>
                    <option value="card">Cartão</option>
                    <option value="ticket">Boleto</option>  
                </select>
        </label>

    <div class="flex items-center gap-3">
        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Salvar</button>
        <a href="{{ route('sales.index') }}" class="text-blue-600 hover:underline">Voltar</a>
    </div>
</form>

</body>
</html>