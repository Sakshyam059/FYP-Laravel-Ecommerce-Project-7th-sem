<div class="px-5 py-3 mt-3 border rounded bg-gray-50/25">
  
    <h5 class="font-semibold ">Size and Color</h2>

    <div class="py-3 space-y-3">
        <div class="grid grid-cols-3 gap-4 size-color-info">
            <select class="w-full rounded color-info"  name="skus[0][color_id]">
                <option value="">Choose a color</option>
                @foreach (App\Models\Color::all() as $color)
                    <option value="{{$color->id}}">{{$color->color_name}}</option>         
                    @endforeach
                </select>
                <select  class="w-full rounded size-info" name="skus[0][size_id]">
                    <option value="">Choose a size</option>
                    @foreach (App\Models\Size::all() as $size)
                    <option value="{{$size->id}}">{{$size->size_name}}</option>         
                @endforeach
                
            </select>
            <input type="text" class="w-full rounded quantity-info"  value="" placeholder="Enter Quantity" class="w-full rounded bg-gray-100/40" name="skus[0][quantity]">
        </div>
    </div>
    <div>
        <button type="button" class="px-4 py-2 text-sm text-white bg-blue-600 rounded add-more">Add More</button>
    </div>
</div>
@push('script')
<script>
    var addButtonHTML, removeButtonHTML;
    $(document).ready(function () {
        addButtonHTML = '<input type="button" class="add-more" value="+" />';
        removeButtonHTML = '<input type="button" class="remove-input" value="-" />';
        
        var count=1;
        $(".add-more").on("click", function () {
            var inputRowHTML = $('.size-color-info:first').clone();
            $(".size-color-info").last().after(inputRowHTML);
            $(".size-color-info:last .color-info").attr("name","skus["+count+"][color_id]");
            $(".size-color-info:last .size-info").attr("name","skus["+count+"][size_id]");
            $(".size-color-info:last .quantity-info").attr("name","skus["+count+"][quantity]");
            count++;

        });

        $("body").on("click", ".remove-input", function () {
            $(this).parent().remove();
        });
    });

    function showAddRemoveIcon() {
        $('.form-input').find(".add-more").after(removeButtonHTML);
        $('.form-input').last().find(".remove-input").remove();

        $('.form-input').find(".add-more").remove();
        $('.form-input').last().append(addButtonHTML);
    }
</script>
@endpush
