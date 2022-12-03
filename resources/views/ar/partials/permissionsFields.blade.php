@php
    $results = \Spatie\Permission\Models\Permission::all();
    $options = \Spatie\Permission\Models\Permission::all()
        ->pluck('name', 'id')
        ->toArray();

    $permission_collection = [];
    foreach ($options as $key => $name) {
        $entity_arr = explode(' ', $name);
        $permission_collection[end($entity_arr)][$key] = $entity_arr[0];
    }
@endphp

<div>
    <label class="font-weight-normal" style="cursor: pointer">
        <input id="allCheck" type="checkbox" class="input border mr-2 checkbox-checkall-check" onclick="checkAllAlls()">&nbsp;Check All
    </label>
</div>

@foreach ($permission_collection as $key => $collection)

    @php
        $classId = $loop->iteration;
    @endphp

        <div class="mt-3"> <label>{{ $key }}</label>
            <div class="flex flex-col sm:flex-row mt-2">
                <div class="flex items-center text-gray-700 mr-2">
                    <input type="checkbox" class="input border mr-2 checkbox-checkall-check-child checkall-{{ $classId }}" onclick="checkall({{ $classId }})" type="checkbox" id="{{$key}}">
                    <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">
                        All
                    </label>
                </div>
                @foreach ($collection as $identifier => $option)

                    @php
                        $string  = $collection[$identifier]. ' '. $key;
                        $permission = \Spatie\Permission\Models\Permission::where('name', $string)->first();
                        $permissionIdArr = $role->permissions->pluck('id')->toArray();
                        $checkStatus = in_array($permission->id, $permissionIdArr);
                    @endphp

                    <div class="flex items-center text-gray-700 mr-2">
                        <input type="checkbox" class="input border mr-2 checkbox-checkall-check-child checkall-checkbox-{{ $classId }}" id="permission-name" name="permissions[{{ $permission->id }}]" {{ isset($role) ? ($checkStatus ?  'checked' : '') : '' }}>
                        <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">{{ $option }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
@endforeach

{{-- @if(!isset($role)) --}}
    <script>
        $(document).ready(function() {
            checkAllAlls();
        });
    </script>
{{-- @endif --}}

<script>

    function checkall(key) {
        var checkboxParentClass = '.checkall-'+ key;
        var checkboxChildClass = '.checkall-checkbox-'+ key;

        if ($(checkboxParentClass).is(':checked')) {
            $(checkboxChildClass).attr('checked', true);
        } else {
            $(checkboxChildClass).attr('checked', false);
        }
    }

    function checkAllAlls() {
        if ($('.checkbox-checkall-check').is(':checked')) {
            $('.checkbox-checkall-check-child').attr('checked', true);
        } else {
            $('.checkbox-checkall-check-child').attr('checked', false);
        }
    }
</script>

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
