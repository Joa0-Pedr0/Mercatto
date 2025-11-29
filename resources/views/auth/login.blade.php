<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">

        <p class="text-center text-gray-700 text-lg mb-2">
            Bem-vindo novamente ao Mercatto!
        </p>

        <h1 class="text-3xl font-bold mb-6 text-center">Entrar</h1>

        <!-- Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500"
                >
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Senha</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500"
                >
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lembrar-me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300">
                <label for="remember_me" class="ml-2 text-sm text-gray-700">Lembrar-me</label>
            </div>

            <!-- Botões -->
            <div class="flex flex-col gap-3 mt-4">
                <button
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition"
                >
                    Entrar
                </button>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="w-full text-center text-sm text-blue-600 hover:underline"
                    >
                        Criar uma conta
                    </a>
                @endif
            </div>
        </form>
    </div>
</body>
</html>
