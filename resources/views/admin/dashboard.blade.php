<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Bienvenido Administrador
        </h2>
    </x-slot>

    @if(session('token'))
        <p>Tu token de acceso: {{ session('token') }}</p>
    @endif

    <div class="flex flex-col">
        <div class="flex-grow p-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="text-center my-4">
                            <img class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                                src="https://randomuser.me/api/portraits/men/44.jpg" alt="">
                            <div class="py-2">
                                <h3 class="font-bold text-2xl text-gray-800 dark:text-white mb-1">
                                    {{ auth()->user()->name }}
                                </h3>
                                <div class="text-gray-700 dark:text-gray-300 items-center">
                                    <p>¡Bienvenido {{ auth()->user()->role }}!</p>
                                    <p>Mail: {{ auth()->user()->email }}</p>
                                    <p>Creation Date: {{ auth()->user()->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-grow p-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-4 mt-4 ml-4 text-center">List of Users</h1>
                    <table class="min-w-full mx-auto mb-4">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Nombre</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Correo electrónico</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Fecha de cumpleaños</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $usuario->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $usuario->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $usuario->email }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $usuario->birth_date }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $usuario->role }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white shadow-sm sm:rounded-lg p-4 text-gray-900 text-center mt-auto">
        <p>&copy; {{ date('Y') }} Todos los derechos reservados.</p>
        <p>Desarrollado por FDL</p>
    </footer>

</x-app-layout>
