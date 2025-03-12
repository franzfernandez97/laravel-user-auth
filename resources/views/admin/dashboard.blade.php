<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Bienvenido Administrador
        </h2>
    </x-slot>
    <div class="flex justify-center py-12 w-full">
        <table class="w-11/12 bg-white border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-[#11121E]">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Nombre
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Correo electrónico
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Rol
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="2">
                            No hay usuarios
                        </td>
                    </tr>
                @else
                    @foreach($data as $user)
                        <tr>
                            <td class="px-6 py-5 whitespace-nowrap">
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
