@extends('layouts.dashboards.owner')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-32">

    {{-- Welcome banner --}}
    <div class="bg-[#E8DFC8] px-6 py-8 rounded-3xl lg:p-8 w-full flex flex-col sm:flex-row items-center text-center sm:text-left gap-6 sm:gap-8 shadow-md mb-10">

        <img
            src="{{ asset('pictures/default-profile.jpg') }}"
            alt="Profile Picture"
            class="w-32 h-32 sm:w-40 sm:h-40 rounded-full object-cover border-4 border-white">

        <div class="flex flex-col items-center sm:items-start">
            <h1 class="text-4xl sm:text-5xl font-bold text-[#2F4730]">
                Hi, {{ Auth::user()->name }}!
            </h1>

            <h2 class="mt-2 text-[18px] sm:text-[20px] text-[#2F4730]">
                Ready to schedule a walk?
            </h2>

            <button class="bg-[#6B8E6E] mt-[20px] text-white rounded-xl px-6 py-3 hover:bg-[#2F4730] w-fit">
                Schedule walk
            </button>
        </div>
    </div>

    {{-- Stats --}}
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full mb-12">

        <div class="grid grid-cols-2 bg-[#E8DFC8] rounded-xl p-6 shadow">
            <div class="flex justify-center items-center text-[#2F4730]">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>
                </svg>
            </div>

            <div class="items-center flex flex-col justify-center">
                <h2 class="text-[#2F4730] font-bold text-center">Upcoming walks:</h2>
                <p class="text-[#2F4730] text-[20px]">2</p>
            </div>
        </div>

        <div class="grid grid-cols-2 bg-[#E8DFC8] rounded-xl p-6 shadow">
            <div class="flex justify-center items-center text-[#2F4730]">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 6 9 17l-5-5"/>
                </svg>
            </div>

            <div class="items-center flex flex-col justify-center">
                <h2 class="text-[#2F4730] font-bold text-center">Completed walks:</h2>
                <p class="text-[#2F4730] text-[20px]">10</p>
            </div>
        </div>

        <div class="grid grid-cols-2 bg-[#E8DFC8] rounded-xl p-6 shadow">
            <div class="flex justify-center items-center text-[#2F4730]">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="4" r="2"/><circle cx="18" cy="8" r="2"/><circle cx="20" cy="16" r="2"/>
                    <path d="M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z"/>
                </svg>
            </div>

            <div class="items-center flex flex-col justify-center">
                <h2 class="text-[#2F4730] font-bold text-center">Registered dogs:</h2>
                <p class="text-[#2F4730] text-[20px]">3</p>
            </div>
        </div>

    </section>

    {{-- Ongoing walks --}}
    <h2 class="text-4xl font-bold text-[#2F4730] mt-10 mb-6">
        Ongoing Walks
    </h2>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        @foreach($walks as $walk)
            @if(!in_array($walk->status, ['completed', 'cancelled']))
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md border border-gray-100 flex flex-col sm:flex-row items-center sm:items-end gap-6">

                    <img
                        src="{{ asset('pictures/dashboardDog.jpg') }}"
                        alt="Dog"
                        class="w-28 h-28 rounded-full object-cover sm:self-center">

                    <div class="flex-1 text-center sm:text-left">
                        <h3 class="text-2xl font-bold text-[#2F4730] mb-1">
                            {{ $walk->dog->name }}
                        </h3>

                        <p class="text-gray-700 mb-1">
                            Walker: {{ $walk->walker->name }}
                        </p>

                        <p class="text-gray-700 mb-2">
                            {{ $walk->scheduled_at }}
                        </p>

                        <span @class([
                            'inline-block px-4 py-1 rounded-full text-sm font-semibold',
                            'bg-yellow-100 text-yellow-700' => $walk->status === 'pending',
                            'bg-green-100 text-green-700' => $walk->status === 'accepted',
                        ])>
                            ● {{ ucfirst($walk->status) }}
                        </span>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto justify-center sm:mb-1">
                        <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-xl text-white w-full sm:w-auto">
                            Cancel Walk
                        </button>

                        <button class="bg-[#6B8E6E] hover:bg-[#2F4730] px-4 py-2 rounded-xl text-white w-full sm:w-auto">
                            View Details
                        </button>
                    </div>

                </div>
            @endif
        @endforeach
    </div>

    {{-- Completed walks --}}
    <h2 class="text-4xl font-bold text-[#2F4730] mt-12 mb-6">
        Completed Walks
    </h2>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        @foreach($walks as $walk)
            @if(in_array($walk->status, ['completed', 'cancelled']))
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md border border-gray-100 flex flex-col sm:flex-row items-center sm:items-end gap-6">

                    <img
                        src="{{ asset('pictures/dashboardDog.jpg') }}"
                        alt="Dog"
                        class="w-28 h-28 rounded-full object-cover sm:self-center">

                    <div class="flex-1 text-center sm:text-left">
                        <h3 class="text-2xl font-bold text-[#2F4730] mb-1">
                            {{ $walk->dog->name }}
                        </h3>

                        <p class="text-gray-700 mb-1">
                            Walker: {{ $walk->walker->name }}
                        </p>

                        <p class="text-gray-700 mb-2">
                            {{ $walk->scheduled_at }}
                        </p>

                        <span @class([
                            'inline-block px-4 py-1 rounded-full text-sm font-semibold',
                            'bg-green-100 text-green-700' => $walk->status === 'completed',
                            'bg-red-100 text-red-700' => $walk->status === 'cancelled',
                        ])>
                            {{ $walk->status === 'completed' ? '✓ Completed' : '● Cancelled' }}
                        </span>
                    </div>

                    <div class="w-full sm:w-auto flex justify-center sm:mb-1">
                        <button class="bg-[#6B8E6E] hover:bg-[#2F4730] px-4 py-2 rounded-xl text-white w-full sm:w-auto">
                            View Details
                        </button>
                    </div>

                </div>
            @endif
        @endforeach
    </div>

</div>

@endsection