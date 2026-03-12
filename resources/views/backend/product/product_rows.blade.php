@forelse ($products as $key => $product)
    <tr>
        <td class="text-center fs-sm">{{ $offset + $key + 1 }}</td>
        <td class="fw-semibold fs-sm"> <img src="{{ asset($product->image) }}" class="productNameImage" alt="">
            {{ $product->name }}</td>
        <td class="fw-semibold fs-sm">{{ $product->price }}</td>
        <td class="fw-semibold fs-sm">
            <div class="form-check form-switch text-center">
                <input class="form-check-input" id="status" type="checkbox"
                    {{ $product->is_featured == 'active' ? 'checked' : '' }} name="featured" data-id="{{ $product->id }}"
                    data-status="{{ $product->is_featured }}" onchange="updateProductFeatured(this)">
            </div>
        </td>
        <td class="fw-semibold fs-sm">
            <div class="form-check form-switch text-center">
                <input class="form-check-input" id="status" type="checkbox"
                    {{ $product->status == 'active' ? 'checked' : '' }} name="status" data-id="{{ $product->id }}"
                    data-status="{{ $product->status }}" onchange="updateProductStatus(this)">
            </div>
        </td>
        <td class="text-center">
            <div class="d-flex">
                <a href="{{ route('admin.product.show', $product->id) }}" class="border-0 btn btn-sm">
                    <i class="fa fa-eye text-secondary fa-xl"></i>
                </a>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="border-0 btn btn-sm">
                    <i class="fa fa-pencil text-secondary fa-xl"></i>
                </a>
                <button type="button" class="border-0 btn btn-sm" onclick="deleteProduct(this)"
                    data-id="{{ $product->id }}"><i class="fa fa-trash text-danger fa-xl"></i></button>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">No Product Found!</td>
    </tr>
@endforelse
