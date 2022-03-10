<option selected disabled>{{$labels['choose_section']}}</option>

@forelse($sub_cat as $subCategory)

    @if(getLang() === 'ar')
        <option value="{{$subCategory->id}}" >{{$subCategory->name_ar}} </option>
    @else
        <option value="{{$subCategory->id}}">{{$subCategory->name_en}} </option>
    @endif
@empty
@endforelse

