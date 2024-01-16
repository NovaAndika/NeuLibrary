<x-layout>

    <div class="d-flex align-items-center justify-content-center position-absolute top-50 start-50 translate-middle">
        <x-card titleStyle="bg-cMedium text-white text-center" title="Login">

            <form action="/login" method="POST">
                @csrf

                <x-input id="email" name="Email" type="email"></x-input>
                <x-input id="password" name="Password" type="password" inputStyle="mb-3"></x-input>
                <div class="col-12">
                    <button class="btn btn-cMedium text-white" type="submit">Submit</button>
                </div>
            </form>

        </x-card>
    </div>

</x-layout>
