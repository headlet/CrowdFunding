@extends('backend.system.layout.master')

@section('title')
    Team
@endsection

@section('content')
    <section class="min-h-screen p-4 bg-gray-100 md:p-8">

        <!-- Header -->
        <div class="flex flex-col items-stretch justify-between gap-3 mb-6 md:flex-row md:items-center">
            <input type="text" placeholder="Search team members..."
                class="border border-gray-300 rounded-lg px-4 py-2.5 w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
            <div>
                <a href="{{ route('admin.team.create') }}"
                    class="px-6 py-2.5 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors text-center font-medium whitespace-nowrap">
                    <i class="mr-2 fas fa-plus"></i>Add Team Member
                </a>
            </div>
        </div>


        <!-- Team Grid -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse($resources as $member)
                <div
                    class="flex flex-col h-full overflow-hidden transition-all duration-300 bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-lg">

                    <div class="flex flex-col flex-1 p-4">

                        <!-- Profile Image -->
                        <div class="flex justify-center mb-3">
                            <img src="{{ $member->image ? asset('storage/' . $member->image) : asset('images/default-avatar.png') }}"
                                alt="{{ $member->name }}"
                                class="object-cover w-24 h-24 border-4 border-gray-100 rounded-full shadow-sm">
                        </div>

                        <!-- Name & Designation -->
                        <div class="mb-2 text-center">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">
                                {{ $member->name }}
                            </h3>
                            <p class="text-xs text-gray-500 truncate">
                                {{ $member->designation }}
                            </p>
                        </div>

                        <!-- Bio -->
                        <div class="flex-1 mb-3">
                            @if ($member->bio)
                                <p class="text-xs leading-relaxed text-center text-gray-600">
                                    {{ Str::limit($member->bio, 80) }}
                                </p>
                            @else
                                <p class="text-xs italic text-center text-gray-400">
                                    No bio available
                                </p>
                            @endif
                        </div>

                        <!-- Social Links -->
                        <div class="flex justify-center gap-2 mb-3">
                            @if ($member->facebook)
                                <a href="{{ $member->facebook }}" target="_blank"
                                    class="flex items-center justify-center w-8 h-8 text-blue-600 transition border border-blue-200 rounded-full hover:bg-blue-50">
                                    <i class="text-xs fab fa-facebook-f"></i>
                                </a>
                            @endif

                            @if ($member->twitter)
                                <a href="{{ $member->twitter }}" target="_blank"
                                    class="flex items-center justify-center w-8 h-8 transition border rounded-full text-sky-500 border-sky-200 hover:bg-sky-50">
                                    <i class="text-xs fab fa-twitter"></i>
                                </a>
                            @endif

                            @if ($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank"
                                    class="flex items-center justify-center w-8 h-8 text-blue-700 transition border border-blue-200 rounded-full hover:bg-blue-50">
                                    <i class="text-xs fab fa-linkedin-in"></i>
                                </a>
                            @endif
                        </div>

                        <!-- Status -->
                        <div class="flex justify-center mb-2">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 text-[11px] font-semibold rounded-full
                        {{ $member->status ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                {{ $member->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-center gap-2 px-4 py-3 border-t bg-gray-50">
                        <a href="{{ route('admin.team.edit', $member->id) }}"
                            class="p-1.5 text-blue-600 transition rounded-lg hover:bg-blue-100" title="Edit">
                            <i class="text-base fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this team member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 text-red-600 transition rounded-lg hover:bg-red-100"
                                title="Delete">
                                <i class="text-base fas fa-trash"></i>
                            </button>
                        </form>
                    </div>

                </div>

            @empty
                <div class="overflow-hidden bg-white rounded-lg shadow-md col-span-full">
                    <div class="px-4 py-10 text-center">
                        <i class="mb-3 text-4xl text-gray-300 fas fa-users"></i>
                        <p class="text-base font-medium text-gray-500">No team members found</p>
                        <p class="mt-1 text-sm text-gray-400">Get started by adding your first team member</p>
                    </div>
                </div>
            @endforelse
        </div>


        @if (method_exists($resources, 'links') && $resources->hasPages())
            <div class="px-4 py-3 mt-6 bg-white border-t border-gray-200 rounded-lg shadow-md">
                {{ $resources->links() }}
            </div>
        @endif

    </section>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
