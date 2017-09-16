{{--<div class="form-group">
    <div class="col-sm-12">
        <select data-placeholder="Warranty" name="{{ $attributes['slug'] }}" class="select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
            @foreach($warranty as $key => $value)
                <option value="{{ $key }}" @if(old($attributes['name']))selected @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
--}}<div class="form-group">
    <label for="field-{{$slug}}">{{$title }}</label>
    @foreach($config as $key => $var)
        <div class="radio">
            <label class="i-checks">
                <input type="radio"
                       id="field-{{$slug}}"
                       value="{{$key}}"
                       @if(isset($value) and $value === $key) checked @endif
                       name="content[{{$lang}}]{{$name}}"
                ><i></i> {{$var}}
            </label>
        </div>
    @endforeach
</div>
<div class="line line-dashed b-b line-lg"></div>
