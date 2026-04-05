<x-layout title="Form Test">
    <div class="mx-auto max-w-2xl p-8 text-white">
        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-600/20 border border-green-500 p-4 text-green-100">
                {{ session('success') }}
            </div>
        @endif

        @if(session('warning'))
            <div class="mb-4 rounded-lg bg-yellow-600/20 border border-yellow-500 p-4 text-yellow-100">
                {{ session('warning') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 rounded-lg bg-red-600/20 border border-red-500 p-4 text-red-100">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 rounded-lg bg-red-600/20 border border-red-500 p-4 text-red-100">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/formtest" class="space-y-6 rounded-lg bg-slate-900/80 p-6 shadow-lg">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-white">Email</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="juan@example.com" class="block w-full rounded-md border border-white/10 bg-slate-950/50 px-3 py-2 text-white outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30" />
                </div>
            </div>
            <button type="submit" class="rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400">Save</button>
        </form>

        <div class="mt-8 rounded-lg bg-slate-900/80 p-6 shadow-lg">
            <h2 class="text-xl font-semibold text-white">Emails</h2>
            @if(count($emails) > 0)
                <ul class="mt-4 space-y-3">
                    @foreach($emails as $index => $email)
                        <li class="flex items-center justify-between rounded-md border border-white/10 bg-slate-950/60 px-4 py-3">
                            <span>{{ $email }}</span>
                            <form method="POST" action="/formtest/delete">
                                @csrf
                                <input type="hidden" name="index" value="{{ $index }}">
                                <button type="submit" class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold text-white hover:bg-red-500">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="mt-4 text-sm text-gray-300">No emails saved yet.</p>
            @endif
        </div>
    </div>
</x-layout>