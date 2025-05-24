<x-layout>
    <h1 class="title text-center font-bold text-3xl">Register</h1>
    <div class="flex flex-col items-center justify-center">
        <div class=" mx-auto max-w-screen-sm card">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <label class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text" name="name" placeholder="Name" class="input input-bordered input-primary w-full max-w-xs">
                    </div>
                    <div class="flex flex-col">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" placeholder="Email" class="input input-bordered input-primary w-full max-w-xs">
                    </div>
                    <div class="flex flex-col">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" placeholder="Password" class="input input-bordered input-primary w-full max-w-xs">
                    </div>
                    <div class="flex flex-col">
                        <label class="label">
                            <span class="label-text">Confirm Password</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input input-bordered input-primary w-full max-w-xs">
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary bg-slate-800 text-white mt-6">Register</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>