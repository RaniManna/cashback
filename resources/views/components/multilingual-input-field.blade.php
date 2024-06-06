
@props(['name', 'languages'])

<div class="form-group col-sm-12 " style="border-bottom: 1px solid #ccc; padding-bottom: 2px;">
    <div class="input-group">
        {!! Form::label($name, ucfirst($name) . ':', ['class' => 'input-group-text', 'style' => 'border: none; background: none;']) !!}
        {!! Form::text("main{$name}", null, ['class' => 'form-control', 'id' => "main{$name}", 'required', 'style' => 'border: none; box-shadow: none;']) !!}
        <div class="input-group-append">
            <select id="languageSelector" class="form-control" style="border: none; box-shadow: none;">
                @foreach($languages as $language)
                    <option value="{{ $language->code }}">{{ $language->Title }}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#languageModal" style="border: none; background: none;">
                <i class="fa fa-expand-arrows-alt" style="font-size: 1.5em;"></i>
            </button>
        </div>
    </div>
    @foreach($languages as $language)
        {!! Form::hidden("{$name}[{$language->code}]", null, ['id' => "{$name}_{$language->code}"]) !!}
    @endforeach
</div>

<div class="modal fade" id="languageModal" tabindex="-1" role="dialog" aria-labelledby="languageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageModalLabel">Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($languages as $language)
                    <div class="form-group">
                        {!! Form::label("{$name}_{$language->code}", "{$language->Title}") !!}
                        {!! Form::text("{$name}[{$language->code}]", null, ['class' => 'form-control modal-input', 'data-lang' => $language->code]) !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @section('scripts')
        <script>
            $(document).ready(function() {
                function updateHiddenInput(selectedLang, value) {
                    $('#{{$name}}_' + selectedLang).val(value);
                }

                function updateMainInputField() {
                    var selectedLang = $('#languageSelector').val();
                    var title = $('#{{$name}}_' + selectedLang).val();
                    $('#main{{$name}}').val(title).attr('name', '{{$name}}[' + selectedLang + ']');
                }

                function updateModalInputs() {
                    $('.modal-input').each(function() {
                        var lang = $(this).data('lang');
                        var value = $('#{{$name}}_' + lang).val();
                        $(this).val(value);
                    });
                }

                $('#languageSelector').change(function() {
                    updateMainInputField();
                });

                $('.modal-input').on('input', function() {
                    var lang = $(this).data('lang');
                    var value = $(this).val();
                    updateHiddenInput(lang, value);
                    updateMainInputField();
                });

                $('#languageSelector').trigger('change');

                $('#languageModal').on('show.bs.modal', function(event) {
                    updateModalInputs();
                });

                $('#languageModal').on('hidden.bs.modal', function(event) {
                    $('.modal-input').each(function() {
                        var lang = $(this).data('lang');
                        var value = $(this).val();
                        updateHiddenInput(lang, value);
                    });
                    updateMainInputField();
                });

                $('#main{{$name}}').on('input', function() {
                    var selectedLang = $('#languageSelector').val();
                    var value = $(this).val();
                    updateHiddenInput(selectedLang, value);
                    $('[name="{{$name}}[' + selectedLang + ']"]').val(value);
                });
            });
        </script>
    @endsection
@endpush
