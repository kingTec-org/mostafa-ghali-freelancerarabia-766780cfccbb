<option selected disabled>choose section</option>

@forelse($sub_cat as $subCategory)

    <option value="{{$subCategory->id}}" {{$service->sub_category_id == $subCategory->id?'selected':''}}>{{$subCategory->name_en}} </option>

@empty
@endforelse

