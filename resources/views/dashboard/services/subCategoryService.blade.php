<option selected disabled>choose section</option>

@forelse($sub_cat as $subCategory)

    <option value="{{$subCategory->id}}">{{$subCategory->name_en}} </option>

@empty
@endforelse

