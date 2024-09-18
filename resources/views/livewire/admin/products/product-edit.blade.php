<div>
    <form wire:submit="save">
        <figure class="mb-4 relative">
            <div class="absolute top-8 right-8">
                <label class="flex items-center px-4  py-2 rounded-lg bg-white cursor-pointer text-gray-700">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar Imagen

                    <input type="file" class="hidden" accept="image/*" wire:model="image">
                    <div wire:loading wire:target="image">Uploading...</div>
                    @error('image')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <img class="aspect-[1/1] object-cover object-center w-full"
                src="{{ $image ? $image->temporaryUrl() : Storage::url($productEdit['image_path']) }}" alt="">
        </figure>

        <x-validation-errors class="mb-4" />

        <div class="card">
            <div class="mb4">
                <x-label class="mb-1">
                    Código
                </x-label>

                <x-input wire:model="productEdit.sku" class=" w-full" placeholder="Ingrese el codigo del producto" />
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>

                <x-input wire:model="productEdit.name" class=" w-full" placeholder="Ingrese el Nombre del Producto" />
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Descripción
                </x-label>

                <x-textarea wire:model="productEdit.description" class=" w-full"
                    placeholder="Ingrese la Descipción del Producto">
                </x-textarea>
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Familias
                </x-label>
                <x-select class=" w-full" wire:model.live="family_id">
                    <option value="" disabled>Seleccione una Familia</option>

                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">
                            {{ $family->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Categorías
                </x-label>
                <x-select class=" w-full" wire:model.live="category_id">
                    <option value="" disabled>Seleccione una Categoría</option>

                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Subcategorías
                </x-label>
                <x-select class=" w-full" wire:model="productEdit.subcategory_id">
                    <option value="" disabled>Seleccione una Subcategoría</option>

                    @foreach ($this->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">
                            {{ $subcategory->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Precio
                </x-label>
                <x-input type="number" step="0.01" wire:model="productEdit.price" class=" w-full"
                    placeholder="Ingrese el precio del producto" />
            </div>

            @empty($product->variants->count() > 0)
                <div class="mb-4">
                    <x-label class="mb-1">
                        Sock
                    </x-label>
                    <x-input type="number" wire:model="productEdit.stock" class=" w-full"
                        placeholder="Ingrese el stock del producto" />
                </div>
            @endempty
            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>

        </div>
    </form>
</div>
