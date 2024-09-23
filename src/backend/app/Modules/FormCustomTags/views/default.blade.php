{!! !$hide_label ? Form::Label($name, $label) : '' !!}
<div style="position: relative;">
    <input type="text" name="{{ $name }}" id="{{ $id }}" class="form-control" value="" style="height: auto">
    @if($readonly)
        <div class="readonly"
             style="  position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.1); z-index: 9; cursor: not-allowed ">

        </div>
    @endif
</div>
<script>
    $(function () {
        var config = {!! json_encode($magicSuggest) !!};

        if (config.maxSelectionText !== '') {
            config.maxSelectionRenderer = function () {
                return config.maxSelectionText;
            }
        }
        var ms = $('#{{ $id }}').magicSuggest(config);

        ms.setValue({!! json_encode($value) !!});

        $(ms).on('selectionchange', function () {
            $('#{{ $id }}').closest('form').trigger('change');
        });
    });
</script>