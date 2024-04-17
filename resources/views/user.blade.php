<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">{{ __('User Listing') }}</h2>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Profile') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->first_name }}
                                        {{ $user->last_name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->email }}</td>
                                    @if (!empty($user->profile))
                                        <td class="px-6 py-4 whitespace-no-wrap"><img src="{{ asset('storage/' . $user->profile) }}" alt="Profile Image" style="border-radius: 50%;" height="100px" width="100px"></td>
                                    @else
                                        <td class="px-6 py-4 whitespace-no-wrap">no image</td>
                                    @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
