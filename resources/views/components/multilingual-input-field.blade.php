@props(['name', 'languages','inputType',"inputAttrs"])

<div class="col-sm-12 mb-3 mt-3 ">
    {!! Form::label($name, ucfirst($name) . ':', ['class' => 'input-group-text p-0 font-weight-bold', 'style' => 'border: none; background: none;']) !!}
    <div class="input-group form-group col-sm-12 pt-0" style="border-bottom:1px solid #ccc; padding-bottom: 2px;">
        @if($inputType == "input")
            {!! Form::text("main{$name}", null, ['class' => 'form-control pt-0 pb-0', 'id' => "main{$name}", 'style' => 'border: none; box-shadow: none;', "placeholder"=>"Enter {$name}", $inputAttrs]) !!}
        @endif

        @if($inputType == "textarea")
            {!! Form::textarea("main{$name}", null, ['class' => 'form-control pt-0 pb-0', 'id' => "main{$name}", "placeholder"=>"Enter {$name}", $inputAttrs]) !!}
        @endif

        <div class="input-group-append">
            <select id="languageSelector{{$name}}" class="form-control pt-0 pb-0"
                    style="border: none; box-shadow: none;cursor: pointer">
                @foreach($languages as $language)
                    <option value="{{ $language->code }}">{{ $language->Title }}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-outline-secondary pt-0 pb-0" data-toggle="modal"
                    data-target="#languageModal{{$name}}" style="border: none; background: none;">
                <i class="fa fa-expand-arrows-alt" style="font-size: 1.5em;"></i>
            </button>
        </div>
    </div>
    @foreach($languages as $language)
        {!! Form::hidden("{$name}[{$language->code}]", null, ['id' => "{$name}_{$language->code}","class" => "{$name}Translate",'data-lang' => $language->code]) !!}
    @endforeach
</div>

<div class="modal fade" id="languageModal{{$name}}" tabindex="-1" role="dialog"
     aria-labelledby="languageModal{{$name}}Label"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageModal{{$name}}Label">{{$name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($languages as $language)
                    <div class="form-group">
                        {!! Form::label("{$name}_{$language->code}", "{$language->Title}") !!}
                        @if($inputType == "input")
                            {!! Form::text("{$name}[{$language->code}]", null, ['class' => "form-control modal-input-$name", 'data-lang' => $language->code,$inputAttrs]) !!}
                        @endif

                        @if($inputType == "textarea")
                            {!! Form::textarea("{$name}[{$language->code}]", null, ['class' => "form-control modal-input-$name", 'data-lang' => $language->code,$inputAttrs]) !!}
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@push('script-stack')
    <script>
        function updateHiddenInput(selectedLang, value, fieldName) {
            $(`#${fieldName}_` + selectedLang).val(value);
        }

        function updateMainInputField(fieldName) {
            var selectedLang = $(`#languageSelector${fieldName}`).val();
            var title = $(`#${fieldName}_` + selectedLang).val();
            $(`#main${fieldName}`).val(title);
        }

        function updateModalInputs(fieldName) {
            $(`.modal-input-${fieldName}`).each(function () {
                var lang = $(this).data('lang');
                var value = $(`#${fieldName}_` + lang).val();
                $(this).val(value);
            });
        }
        $(document).ready(function () {
            $('#languageSelector{{$name}}').change(function () {
                updateMainInputField("{{$name}}");
            });

            $('.modal-input-{{$name}}').on('input', function () {
                var lang = $(this).data('lang');
                var value = $(this).val();
                updateHiddenInput(lang, value, "{{$name}}");
                updateMainInputField("{{$name}}");
            });

            $('#languageSelector{{$name}}').trigger('change');

            $('#languageModal{{$name}}').on('show.bs.modal', function (event) {
                updateModalInputs("{{$name}}");
            });

            $('#languageModal{{$name}}').on('hidden.bs.modal', function (event) {
                $('.modal-input-{{$name}}').each(function () {
                    var lang = $(this).data('lang');
                    var value = $(this).val();
                    updateHiddenInput(lang, value, "{{$name}}");
                });
                updateMainInputField("{{$name}}");
            });

            $('.modal-input-{{$name}}').on("keypress",function (event){
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            })


            $('#main{{$name}}').on('input', function () {
                var selectedLang = $('#languageSelector{{$name}}').val();
                var value = $(this).val();
                updateHiddenInput(selectedLang, value, "{{$name}}");
                $('[name="{{$name}}[' + selectedLang + ']"]').val(value);
            });
        });
    </script>
@endpush
