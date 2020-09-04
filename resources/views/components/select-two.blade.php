@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div class="row">
    <div class="col s12">
        <label for="{{$name}}">{{$label}}</label> <br>
        <select
                id="{{$name}}"
                name="{{$name}}"
                class="{{ $errors->has($name) ? 'invalid' : '' }}">
            <option>{{$label}}...</option>
        </select>
        <span class="red-text">{{ $errors->has($name) ? $errors->first($name): '' }}</span>
    </div>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(function () {
            var idSelect = '#{{$name}}';
            var url = '{{$route}}';

            $(idSelect).select2({
                minimumInputLength: 1,
                ajax: {
                    url: url,
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        };
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                console.log(item);
                                return {
                                    text: item.text,
                                    id: item.id
                                }
                            })
                        };
                    },
                },
                language: {
                    inputTooShort: function () {
                        return "Au moins 1 caractère est nécessaire pour lancer la recherche";
                    },
                    noResults: function (params) {
                        return " ";
                    }
                }
            });
        });
    </script>
@endpush
