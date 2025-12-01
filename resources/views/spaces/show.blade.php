<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Espacio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="text-2xl font-bold">{{ $space->name }}</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ ucfirst($space->type) }}</p>
                        </div>
                        <div class="text-right">
                            <span class="block text-xl font-bold text-indigo-600 dark:text-indigo-400">${{ number_format($space->price_per_hour, 2) }}/hr</span>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $space->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $space->status === 'available' ? 'Disponible' : 'Mantenimiento' }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium mb-2">Descripción</h4>
                        <p class="text-gray-700 dark:text-gray-300">{{ $space->description ?? 'Sin descripción.' }}</p>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-medium mb-2">Capacidad</h4>
                        <p class="text-gray-700 dark:text-gray-300">{{ $space->capacity }} Personas</p>
                    </div>

                    <hr class="my-6 border-gray-200 dark:border-gray-700">

                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-bold">Reservas de este Espacio</h4>
                    </div>

                    @if($space->reservations->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400">No hay reservas registradas para este espacio.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Usuario</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Inicio</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fin</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($space->reservations as $reservation)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $reservation->user->name ?? 'Usuario Eliminado' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $reservation->start_time->format('d/m/Y H:i') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $reservation->end_time->format('d/m/Y H:i') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $reservation->status === 'confirmed' ? 'bg-green-100 text-green-800' : '' }}
                                                    {{ $reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                    {{ $reservation->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                                                    {{ $reservation->status === 'completed' ? 'bg-gray-100 text-gray-800' : '' }}">
                                                    {{ ucfirst($reservation->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('spaces.index') }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">
                            &larr; Volver a la lista
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
