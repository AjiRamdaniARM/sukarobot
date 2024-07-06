<x-panel.app>
    @push('extra-css')
        <link rel="stylesheet" href="{{ asset('vendor/select2/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.css') }}">
    @endpush

    <x-slot name="title">
        Create User
    </x-slot>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col">
                        <x-forms.input name="name" 
                            label="name"
                        />
                    </div>
                    <div class="col">
                        <x-forms.input name="email" 
                            label="email"
                        />
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col">
                        <x-forms.input name="community" 
                            label="community"
                        />
                    </div>
                    <div class="col">
                        <x-forms.input name="pob" 
                            label="place of birth"
                        />
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col">
                        <x-forms.input name="dob" 
                            label="date of birth"
                            type="datetime-local"
                        />
                    </div>
                    <div class="col">
                        <x-forms.input name="phone" 
                            label="phone"
                            help="Ex: 0857xxxxxxxx"
                        />
                    </div>
                </div>
                <x-forms.text-area name="address" 
                    label="address"
                />
                <x-forms.select name="role" class="select2" label="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? "selected" :""}}>{{ $role->name }}</option>
                    @endforeach
                </x-forms.select>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

    @push('extra-script')
        <script src={{ asset('vendor/select2/select2.min.js') }}></script>
        <script>
        $(function(){
            $('.select2').select2(
            {
                theme: 'bootstrap4',
            });
        });
        </script>
    @endpush
</x-panel.app>